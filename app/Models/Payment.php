<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['student_id','detail','fee'];

    public function fees()
    {
        return $this->belongsToMany(Fee::class,'fees','fee_id');
    }
}
