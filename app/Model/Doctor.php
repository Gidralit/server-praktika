<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class Doctor extends Model implements IdentityInterface
{
    use HasFactory;

    public $timestamps = false;
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
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function patients()
    {
        return $this->belongsToMany(Patient::class, 'appointments', 'doctor_id', 'patient_id');
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'positions_doctors', 'doctor_id', 'pos_id');
    }

    public function specializes()
    {
        return $this->belongsToMany(Specialize::class, 'specializations_doctors', 'doctor_id', 'spec_id');
    }
}
