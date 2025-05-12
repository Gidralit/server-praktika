<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    public $timestamps = false;

    //Выборка пользователя по первичному ключу

    //Возврат первичного ключа
    public function getId(): int
    {
        return $this->id;
    }

    public function doctors()
    {
        return $this->belongsToMany(Doctor::class, 'positions_doctors', 'pos_id', 'doctor_id');
    }
}
