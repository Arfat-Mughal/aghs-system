<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ebook_id',
        'ebook_file_id',
        'ip_address',
        'user_agent',
    ];

    /**
     * Get the ebook that owns the download.
     */
    public function ebook()
    {
        return $this->belongsTo(Ebook::class);
    }

    /**
     * Get the file that owns the download.
     */
    public function file()
    {
        return $this->belongsTo(EbookFile::class, 'ebook_file_id');
    }
}