<?php

use Model\User;
use PHPUnit\Framework\TestCase;

class EmployeeTest extends TestCase
{

     /*
      * @dataProvider additionProvider
      * @runInSeparateProcess
      */

    public function testAddEmployee(): void
    {
        $employeeData = [
            'username' => 'test123',
            'password' => 'test',
        ];

        $request = $this->createMock(\Src\Request::class);
        $request->expects($this->any())
            ->method('all')
            ->willReturn($employeeData);

        $request->method = 'POST';

        $this->authAsAdmin();

        $result = (new \Controllers\AdminController())->addEmployee($request);

        $userExists = User::where('username', $employeeData['username'])->exists();
        $this->assertTrue($userExists);

        User::where('username', $employeeData['username'])->delete();

    }

    public function authAsAdmin(): void
    {
        $admin = User::where('username', 'admin')->first();
        if ($admin) {
            \Src\Auth\Auth::login($admin);
        }
    }

    public function setUp(): void
    {
        $_SERVER['DOCUMENT_ROOT'] = '/var/www/html';
        $GLOBALS['app'] = new Src\Application(new Src\Settings([
            'app' => include $_SERVER['DOCUMENT_ROOT'] . '/config/app.php',
            'db' => include $_SERVER['DOCUMENT_ROOT'] . '/config/db.php',
            'path' => include $_SERVER['DOCUMENT_ROOT'] . '/config/path.php',
        ]));

        if (!function_exists('app')){
            function app()
            {
                return $GLOBALS['app'];
            }
        }
    }
}