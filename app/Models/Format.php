<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Format extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'extension',
        'mime_type',
    ];

    /**
     * Get the ebook files for the format.
     */
    public function ebookFiles()
    {
        return $this->hasMany(EbookFile::class);
    }
}