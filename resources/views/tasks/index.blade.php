@extends('layouts.app')

@section('title', 'TodoTask - Профіль')

@section('content')
    <a class="btn btn-success my-4" href="{{ route('tasks.create') }}">Створити завдання</a>

    <div class="card mb-4">
        <div class="card-header">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item">
                    <a class="nav-link" href="/tasks/active">Активні</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/tasks/missed">Пропущені</a>
                </li>

            </ul>
        </div>
        <div class="card-body">
            @foreach($tasks as $task)
                <div class="d-flex justify-content-between mb-2 p-2 bg-dark text-white">
                    <p>{{ $task->text }}</p>

                    <div class="btn-group">
                        <div>
                            <a class="btn btn-warning" href="{{ route('tasks.edit', $task->id) }}">Відредагувати</a>
                        </div>
                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Видалити</button>
                        </form>
                    </div>


                </div>
            @endforeach
        </div>
    </div>

    {{ $tasks->links() }}

@endsection
