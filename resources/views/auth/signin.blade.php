@extends('layouts.app')

@section('title', 'TodoTask - Увійти')

@section('content')
    <div class="row">
        <div class="col-lg-4 mx-auto mt-4">
            <h3 class="text-center">Увійти</h3>
            <form class="form-group" method="POST" action="{{ route('post.signin') }}">
                @csrf
                <div class="mb-3">
                    <label for="login" class="form-label">Логін</label>
                    <input type="text" class="form-control"  value="{{ old('login') }}" name="login" id="login">
                </div>
                <div class="mb-3">
                    <label for="login" class="form-label">Пароль</label>
                    <input type="password" class="form-control"  name="password" id="password">
                </div>

                <button type="submit" class="btn btn-primary">Увійти</button>
            </form>
        </div>
    </div>
@endsection
