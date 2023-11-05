<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
// use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//redirct to where the all tasks at
Route::get('/', function () {
    return redirect()->route('task.index');
});
//fetching all tasks and display them
Route::get('/task', function () {

    return view('tst/index', [
        // "name" => "abdoo"
        "tasks" => Task::latest()->paginate(10)
    ]);
})->name("task.index");
// create + viewing the create form
Route::view("/task/create", "tst/create")->name("task.create");
//display single task by id
Route::get("/task/{task}", function (Task $task) {
    return view("tst/show", ["task" => $task]);
})->name("task.show");
//take the task and display it on the form
Route::get("/task/{task}/edit", function (Task $task) {
    return view("tst/edit", ["task" => $task]);
})->name("task.edit");
// adding new task 
Route::post("/task", function (TaskRequest $request) {
    // u can escape all this if u add $fillable
    $task = Task::create($request->validated());
    return redirect()->route('task.show', ['task' => $task->id])
        ->with("success", "Created Successfully");
})->name("task.store");;
// updating exiting task
Route::put("/task/{task}", function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('task.show', ['task' => $task->id])
        ->with("success", "Updated Successfully");
})->name("task.update");;
Route::delete("/task/{task}", function (Task $task) {
    $task->delete();
    return redirect()->route('task.index')->with('success', 'task successfully deleted');
})->name("task.destroy");
Route::put('task/{task}/completed', function (Task $task) {
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->back()->with('success', "task updated");
})->name('task.toggel-completed');
