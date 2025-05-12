<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialize extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'specializations';

    //Выборка пользователя по первичному ключу

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'specializations_doctors', 'spec_id', 'doctor_id');
    }
}
