<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];

    use HasFactory;

    public function grade()
    {
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function studentRecodeCards()
    {
        return $this->hasMany(StudentRecodeCard::class,'student_id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->father_name}";
    }
}
