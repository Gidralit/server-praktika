<?php

namespace Controllers;

use Src\Auth\Auth;
use Src\Request;
use Src\View;
use Model\User;

class AuthController
{
    public function login(Request $request): string
    {
        $method = $request->method;
        switch ($method) {
            case 'GET':
                return new View('site.login');
            case 'POST':
                if (Auth::attempt($request->all())) {
                    $user = Auth::user();
                    if ($user->role_id == 2) {
                        app()->route->redirect('/menu');
                        break;
                    }
                    app()->route->redirect('/main');
                }
                return new View('site.login', ['message' => 'Неправильные логин или пароль']);
        }
    }

    public function logout(Request $request): string
    {
        Auth::logout();
        app()->route->redirect('/login');
    }
}