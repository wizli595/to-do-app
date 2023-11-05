@extends('layout.app')
@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('task.index') }}" class="link">
            ← Go back
        </a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>
    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif
    <p class="mb-4  text-sm text-slate-500 "> Created {{ $task->created_at->diffForHumans() }} /
        Updated
        {{ $task->updated_at->diffForHumans() }}
    </p>
    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">completed</span>
        @else
            <span class="font-medium text-red-500">Not completed</span>
        @endif
    </p>
    <div class="flex gap-2">
        <a href="{{ route('task.edit', ['task' => $task]) }}" class="btn  bg-blue-500">
            edit
        </a>
        <form action="{{ route('task.toggel-completed', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn bg-green-500">
                complete
            </button>
        </form>

        <form action="{{ route('task.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn bg-red-600 ">delete</button>
        </form>
    </div>

@endsection
