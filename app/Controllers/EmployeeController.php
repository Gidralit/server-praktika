<?php

namespace Controllers;

use Model\Appointment;
use Model\Doctor;
use Model\Patient;
use Src\Request;
use Src\View;

class EmployeeController
{
    public function index(): string
    {
        return new View('site.menu');
    }

    public function doctors(): string
    {
        return new View('site.menu.doctors', ['doctors' => Doctor::all()]);
    }

    public function appointments(Request $request): string
    {
        $method = $request->method;
        switch ($method) {
            case 'GET':
                return new View('site.menu.appointments', ['appointments' => Appointment::all()]);
        }
    }

    public function patients(): string
    {
        return new View('site.menu.patients', ['patients' => Patient::all()]);
    }
}