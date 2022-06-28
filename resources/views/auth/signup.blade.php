@extends('layouts.app')

@section('title', 'TodoTask - Реєстрація')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto mt-4">
            <h3 class="text-center">Реєстрація</h3>
            <form class="form-group" method="POST" action="{{ route('post.signup') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Ім'я</label>
                    <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Прізвище</label>
                    <input type="text" class="form-control" value="{{ old('surname') }}" name="surname" id="surname">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Логін</label>
                    <input type="text" class="form-control" value="{{ old('login') }}" name="login" id="login">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Пароль</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Зареєструватись</button>
            </form>
        </div>
    </div>
@endsection
