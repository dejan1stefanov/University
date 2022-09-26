<?php

namespace App\Models;

use App\Models\Professor;
use App\Models\Research_Assistant;
use App\Models\Teaching_Assistant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;


    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function professors()
    {
        return $this->hasOne(Professor::class, 'employee_id', 'id');
    }

    public function teaching_assistants()
    {
        return $this->hasOne(Teaching_Assistant::class, 'employee_id', 'id');
    }

    public function research_assistants()
    {
        return $this->hasOne(Research_Assistant::class, 'employee_id', 'id');
    }
}
