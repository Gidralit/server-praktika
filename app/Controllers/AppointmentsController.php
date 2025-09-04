<?php

namespace Controllers;

use Model\Appointment;
use Model\Doctor;
use Model\Patient;
use Src\Request;
use Src\View;

class AppointmentsController
{
    public function add(Request $request): string
    {
        $method = $request->method;

        switch ($method) {
            case 'GET':
                return new View('site.menu.appointments.add', ['doctors' => Doctor::all(), 'patients' => Patient::all()]);
            case 'POST':
                Appointment::create(['patient_id' => $request->patient_id, 'doctor_id' => $request->doctor_id, 'date_time' => $request->date_time]);
                return new View('site.menu.appointments', ['message' => 'Вы успешно создали запись!', 'appointments' => Appointment::all()]);
        }

    }

    public function delete(int $id): string
    {
        Appointment::find($id)->delete();
        return new View('site.menu.appointments', ['message' => 'Вы успешно отменили запись!', 'appointments' => Appointment::all()]);
    }
}