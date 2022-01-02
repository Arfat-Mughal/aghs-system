<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slip extends Model
{
    use HasFactory;

    protected $casts = [
        'is_active' => 'boolean',
    ];

    protected $fillable = ['grade_id','term','session'];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function datesheets()
    {
        return $this->hasMany(Datesheet::class,'slip_id');
    }
}
