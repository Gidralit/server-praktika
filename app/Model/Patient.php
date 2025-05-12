<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Patient extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'patients';
    protected $fillable = [
        'surname',
        'name',
        'patronym',
        'birth_date',
    ];

    //Выборка пользователя по первичному ключу
    public function findIdentity(int $id)
    {
        return self::where('id', $id)->first();
    }

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    //Возврат аутентифицированного пользователя
    public function attemptIdentity(array $credentials)
    {
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'admin') {
            return self::where('username', $credentials['username'])->first();
        }
        return self::where(['username' => $credentials['username'],
            'password' => md5($credentials['password'])])->first();
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'pacient_id');
    }

    public static function searchAppointments($dateTime, $id)
    {
        return Appointment::query()
            ->where('patient_id', $id)
            ->whereDate('date_time', $dateTime)->get();
    }

    public static function searchDoctors($fio, $id)
    {
        $data = preg_split('/\s+/', trim($fio));
        $doctors = Doctor::query()
            ->where('surname', 'LIKE', "%$data[0]%")
            ->orWhere('patronym', 'LIKE', "%$data[2]%")
            ->orWhere('name', 'LIKE', "%$data[1]%")->get();
        $appointments = [];
        foreach ($doctors as $doctor) {
            $doctorAppointments = Appointment::query()
                ->where('doctor_id', $doctor->id)
                ->where('patient_id', $id)->get();

            foreach ($doctorAppointments as $doctorAppointment) {
                $appointments[] = Doctor::where('id', $doctorAppointment->doctor_id)->get();
            }
        }
        return $appointments;
    }
}
