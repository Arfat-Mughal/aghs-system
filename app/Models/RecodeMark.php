<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecodeMark extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function recode()
    {
        return $this->belongsTo(Recode::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function studentsRecodeCards()
    {
        return $this->hasMany(StudentRecodeCard::class,'recode_id');
    }
}
