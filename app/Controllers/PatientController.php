<?php

namespace Controllers;

use Model\Patient;
use Src\Request;
use Src\View;

class PatientController
{
    public function add(Request $request): string
    {
        $method = $request->method;

        switch ($method) {
            case 'GET':
                return new View('site.menu.patient.add');
            case 'POST':
                Patient::create($request->all());
                return new View('site.menu.patients', ['message' => 'Вы успещно добавили пациента!']);
        }
    }

    public function searchAppointments(int $id, Request $request): string
    {
        $method = $request->method;
        switch ($method) {
            case 'GET':
                if ($request->has('date')){
                    $appointments = Patient::searchAppointments($request->get('date'), $id);
                    return new View('site.menu.patient.search.appointments', ['appointments' => $appointments]);
                }
                return new View('site.menu.patient.search.appointments', ['appointments' => []]);
        }
    }

    public function searchDoctors(int $id, Request $request): string
    {
        $method = $request->method;
        switch ($method) {
            case 'GET':
                if ($request->has('FIO') && $request->get('FIO') != '') {
                    $doctors = Patient::searchDoctors($request->get('FIO'), $id);
                    return new View('site.menu.patient.search.doctors', ['doctors' => $doctors]);
                }
                return new View('site.menu.patient.search.doctors', ['doctors' => []]);
        }
    }
}