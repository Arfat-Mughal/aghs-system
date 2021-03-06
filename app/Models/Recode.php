<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recode extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function marks()
    {
        return $this->hasMany(RecodeMark::class,'recode_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function studentsRecodeCards()
    {
        return $this->hasMany(StudentRecodeCard::class,'recode_id');
    }
}
