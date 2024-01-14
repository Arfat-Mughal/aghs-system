<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name'];

    public function students()
    {
       return $this->hasMany(Student::class);
    }

    public function recode()
    {
        return $this->hasMany(Recode::class,'grade_id');
    }

    public function slips()
    {
        return $this->hasMany(Slip::class);
    }
}
