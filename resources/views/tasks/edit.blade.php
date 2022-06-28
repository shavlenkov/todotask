@extends('layouts.app')

@section('title', 'TodoTask - Відредагувати завдання')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto mt-4">
            <h3 class="text-center">Відредагувати завдання</h3>
            <form class="form-group" method="POST" action="{{ route('tasks.update', $task->id) }}">
                @csrf
                @method('PUT')

                <input value="{{ $task->text }}" class="form-control mb-4" placeholder="Текст завдання" name="text"></input>
                <input value="{{ $task->deadline }}" class="form-control mb-4" name="deadline" type="datetime-local">
                <button type="submit" class="btn btn-primary">Відредагувати</button>
            </form>
        </div>
    </div>
@endsection
