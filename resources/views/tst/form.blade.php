@extends('layout.app')
@section('title', isset($task) ? 'edit Task' : 'add task')


@section('content')
    <form action="{{ isset($task) ? route('task.update', ['task' => $task]) : route('task.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div>
            <label for="title">title</label>
            <input type="text" name="title" value="{{ $task->title ?? old('title') }}" @class(['border-red-500' => $errors->has('title')])>
            @error('title')
                <p class="err">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">description</label>
            <textarea name="description" rows="5" @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="err">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="long_description">long description</label>
            <textarea name="long_description" rows="10" @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="err">{{ $message }}</p>
            @enderror
        </div>
        <div class="mt-5">
            <button type="submit" @class([
                'btn',
                'bg-blue-500' => isset($task),
                'bg-green-600' => !isset($task),
            ])>
                @isset($task)
                    update task
                @else
                    add task
                @endisset
            </button>
            <a href="{{ route('task.index') }}" class="link">Cancel</a>
        </div>
    </form>

@endsection
