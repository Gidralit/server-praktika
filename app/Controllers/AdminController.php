<?php

namespace Controllers;

use Model\User;
use Src\Request;
use Gidralit\Validators\Validator;
use Src\View;

class AdminController
{
    public function index(): string
    {
        return new View('site.employees', ['employees' => User::where('role_id', 2)->get(), 'admins' => User::where('role_id', 1)->get()]);
    }

    public function addEmployee(Request $request): string
    {
        $method = $request->method;
        switch ($method) {
            case 'GET':
                return new View('site.addEmployee');
            case 'POST':
                $validator = new Validator($request->all(), [
                    'username' => ['required', 'string', 'min:3', 'max:50', 'unique:users,username'],
                    'password' => ['required', 'string', 'min:3', 'max:50'],
                ],
                ['required' => 'Поле :field обязательно для заполнения',
                    'string' => 'Поле :field должно быть строкой',
                    'min' => 'Поле :field не должно быть меньше :arg[0] символов',
                    'max' => 'Поле :field не должно быть больше :arg[0] символов',
                    'unique' => 'Поле :field уже занято с данными значениями']);
                if ($validator->fails()){
                    return new View('site.addEmployee', ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
                }
                User::create($request->all(), ['role_id' => 2]);
                $_SESSION['message'] = 'Вы успешно добавили сотрудника!';
                header('Location: /');
                return '';
        }
    }
}