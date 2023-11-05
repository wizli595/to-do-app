@extends('layout.app')
@section('title', 'tasks')

@section('content')
    <div class="mb-5">
        <a href="{{ route('task.create') }}" class="link"> create
            Task</a>
    </div>
    @forelse ($tasks as $task)
        <nav>
            <a href={{ route('task.show', ['task' => $task->id]) }} @class(['line-through' => $task->completed])>
                {{ $task->title }}
            </a>
        </nav>

    @empty
        <div>no task :/</div>
    @endforelse
    @if ($tasks->count())
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    @endif
@endsection
