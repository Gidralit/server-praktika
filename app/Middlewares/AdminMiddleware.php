<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;
use Src\View;

class AdminMiddleware
{
    public function handle(Request $request)
    {
        if (!Auth::check()) {
            app()->route->redirect('/login');
        }
        $user = Auth::user();
        if($user->role_id === 2)
        {
            app()->route->redirect('/menu');
        }
    }
}