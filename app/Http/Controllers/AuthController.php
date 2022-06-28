<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function getSignup() {
        return view('auth.signup');
    }

    public function postSignup(Request $request) {

        $request->validate([
            'name' => 'required|min: 3|max: 10',
            'surname' => 'required|min: 3|max: 45',
            'login' => 'required|min: 3|max: 30',
            'password' => 'required|min: 8'
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'login' => $request->input('login'),
            'password' => bcrypt($request->input('password'))
        ]);

        Auth::loginUsingId($user->id);

        return redirect()
            ->route('tasks.active')
            ->with(['message' => 'Ви успішно зареєструвались!', 'class' => 'alert-success']);
    }

    public function getSignin() {
        return view('auth.signin');
    }

    public function postSignin(Request $request) {

        $request->validate([
            'login' => 'required|min: 3|max: 30',
            'password' => 'required|min: 8'
        ]);

        if (!Auth::attempt($request->only(['login', 'password']))) {
            return redirect()
                ->back()
                ->with(['message' => 'Неправильний логін або пароль', 'class' => 'alert-danger']);
        }

        return redirect()
            ->route('tasks.active')
            ->with(['message' => 'Ласкаво просимо!', 'class' => 'alert-success']);
    }

    public function logout() {
        Auth::logout();

        return redirect()
            ->route('home');
    }
}
