@extends('layouts.app')

@section('title', 'TodoTask - Створити завдання')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto mt-4">
            <h3 class="text-center">Створити завдання</h3>
            <form class="form-group" method="POST" action="{{ route('tasks.store') }}">
                @csrf
                <input value="{{ old('text') }}" class="form-control mb-4" placeholder="Текст завдання" name="text"></input>
                <input value="{{ old('deadline') }}" class="form-control mb-4"  name="deadline" type="datetime-local">
                <button  type="submit" class="btn btn-primary">Створити</button>
            </form>
        </div>
    </div>
@endsection
