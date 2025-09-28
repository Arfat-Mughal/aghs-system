<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EbookFile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ebook_id',
        'file_path',
        'file_type',
        'original_name',
        'file_size',
    ];

    /**
     * Get the ebook that owns the file.
     */
    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }

    /**
     * Get the downloads for the file.
     */
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    /**
     * Get the full URL for the file.
     *
     * @return string
     */
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->file_path);
    }
}