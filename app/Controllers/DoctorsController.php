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
                $doctorModel = new Doctor();
                $doctor = Doctor::create(['surname' => $request->surname, 'name' => $request->name, 'patronym' => $request->patronym, 'birth_date' => $request->birth_date, 'photo_path' => $doctorModel->handlePhotoUpload($_FILES['photo'] ?? null)['url']]);
                $doctor->positions()->attach($request->position);
                $doctor->specializes()->attach($request->specialize);
                $_SESSION['message'] = 'Вы успешно добавили врача!';
                header('Location: /doctors');
                exit();
        }
    }

    public function showPatients(int $id): string
    {
        return new View('site.menu.doctor.patients', ['patients' => Doctor::find($id)->patients()->get()]);
    }
}