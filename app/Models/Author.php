<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'bio',
        'image',
    ];

    /**
     * Get the ebooks for the author.
     */
    public function ebooks()
    {
        return $this->hasMany(Ebook::class);
    }
}