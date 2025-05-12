<?php

namespace Controllers;

use Illuminate\Support\Facades\DB;
use Model\Appointment;
use Model\Doctor;
use Model\Position;
use Model\Specialize;
use Src\Request;
use Src\View;

class DoctorsController
{
    public function add(Request $request): string
    {
        $method = $request->method;
        switch ($method) {
            case 'GET':
                return new View('site.menu.doctor.add', ['positions' => Position::all(), 'specializes' => Specialize::all()]);
            case 'POST':
                $doctor = Doctor::create(['surname' => $request->surname, 'name' => $request->name, 'patronym' => $request->patronym, 'birth_date' => $request->birth_date]);
                $doctor->positions()->attach($request->position);
                $doctor->specializes()->attach($request->specialize);
        }
        return new View('site.menu.doctors', ['message' => 'Вы успешно добавили врача!', 'doctors' => Doctor::all()]);
    }

    public function showPatients(int $id): string
    {
        return new View('site.menu.doctor.patients', ['patients' => Doctor::find($id)->patients()->get()]);
    }
}