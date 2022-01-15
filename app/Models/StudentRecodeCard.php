<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentRecodeCard extends Model
{
    use HasFactory;

    public function subject()
    {
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function recode()
    {
        return $this->belongsTo(Recode::class,'recode_id');
    }

    public function students()
    {
        return $this->belongsTo(Student::class,'student_id');
    }
}
