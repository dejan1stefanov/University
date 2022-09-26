<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function majors()
    {
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
}
