<?php

namespace Controllers;

use Model\User;
use Src\Request;
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
                User::create(['role_id' => 2, 'username' => $request->username, 'password' => $request->password]);
                return new View('site.addEmployee', ['message' => 'Вы успешно добавили сотрудника']);
        }
    }
}