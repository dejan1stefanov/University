<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->hasOne(Student::class, 'person_id', 'id');
    }

    public function alumnis()
    {
        return $this->hasOne(Alumni::class, 'person_id', 'id');
    }

    public function employees()
    {
        return $this->hasOne(Student::class, 'person_id', 'id');
    }
}
