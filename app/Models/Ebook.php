<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ebook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'long_description',
        'cover_image',
        'author_id',
        'release_date',
        'length',
        'scripture_references',
        'reflection_questions',
        'scripture_database_link',
        'download_count',
        'last_downloaded_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'release_date' => 'date',
        'last_downloaded_at' => 'datetime',
    ];

    /**
     * Get the author that owns the ebook.
     */
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    /**
     * Get the genres for the ebook.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    /**
     * Get the files for the ebook.
     */
    public function files()
    {
        return $this->hasMany(EbookFile::class);
    }

    /**
     * Get the SEO meta for the ebook.
     */
    public function seoMeta()
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    /**
     * Get the reviews for the ebook.
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get the downloads for the ebook.
     */
    public function downloads()
    {
        return $this->hasMany(Download::class);
    }

    /**
     * Set the ebook's title and auto-generate slug.
     *
     * @param  string  $value
     * @return void
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Get a string of all genres for the ebook.
     *
     * @return string
     */
    public function getGenreListAttribute()
    {
        return $this->genres->pluck('name')->implode(', ');
    }

    /**
     * Scope a query to only include ebooks with a specific genre.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $genre
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeWithGenre($query, $genre)
    {
        return $query->whereHas('genres', function ($q) use ($genre) {
            $q->where('name', $genre);
        });
    }

    /**
     * Increment the download count for the ebook.
     *
     * @return void
     */
    public function incrementDownloadCount()
    {
        $this->increment('download_count');
        $this->update(['last_downloaded_at' => now()]);
    }
}