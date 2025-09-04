<?php

namespace Controllers;

use Gidralit\Validators\Validator;
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
                $validator = new Validator($request->all(), [
                    'username' => ['required'],
                    'password' => ['required'],
                ],
                ['required' => 'Поле :field обязательно для заполнения']);
                if ($validator->fails()) {
                    $view = new View('site.login', ['message' => $validator->errors()]);
                    return $view;
                }
                if (Auth::attempt($request->all())) {
                    $user = Auth::user();
                    if ($user->role_id == 2) {
                        app()->route->redirect('/menu');
                        return '';
                    }
                    app()->route->redirect('/');
                    return '';
                }
                return new View('site.login', ['wrong' => 'Неправильные логин или пароль']);
        }

    }

    public function logout(Request $request): string
    {
        Auth::logout();
        app()->route->redirect('/login');
    }
}