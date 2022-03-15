<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['issue_date','last_date'];

    public function payments()
    {
        return $this->hasMany(Payment::class,'fee_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
