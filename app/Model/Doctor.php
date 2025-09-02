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
        'photo_path'
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

    public function handlePhotoUpload(?array $file): ?array
    {
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $allowedTypes = ['image/jpeg', 'image/png'];
        $fileType = mime_content_type($file['tmp_name']);

        if (!in_array($fileType, $allowedTypes)) {
            return ['error' => 'Разрешены только PNG JPG JPEG изображения'];
        }

        if ($file['size'] > 2 * 1024 * 1024) {
            return ['error' => 'Размер файла не должен превышать 2МБ'];
        }

        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/public/uploads/doctors/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $extension;
        $filePath = $uploadDir . $filename;

        if(!move_uploaded_file($file['tmp_name'], $filePath)) {
            return ['error' => 'Ошибка при сохранении файла...'];
        }

        return ['url' => '/public/uploads/doctors/' . $filename];
    }
}
