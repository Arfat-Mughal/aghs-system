<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'is_active', 'category'];

    /**
     * Get the user that owns the note.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
