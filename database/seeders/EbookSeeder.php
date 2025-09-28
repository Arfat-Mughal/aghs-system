<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Ebook;
use App\Models\EbookFile;

class EbookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Author
        $author = Author::firstOrCreate([
            'name' => 'Max Lucado'
        ], [
            'bio' => 'Max Lucado is a bestselling American author and preacher.',
            'image' => null
        ]);

        // Create Genres
        $genres = [
            'Nonfiction',
            'Christian Living',
            'Self-Help',
            'Inspirational',
            'Personal Development',
            'Emotional Health'
        ];

        $genreModels = [];
        foreach ($genres as $genreName) {
            $genre = Genre::firstOrCreate([
                'name' => $genreName
            ], [
                'description' => 'Genre related to ' . $genreName
            ]);
            $genreModels[] = $genre;
        }

        // Create Ebook
        $ebook = Ebook::firstOrCreate([
            'title' => 'Tame Your Thoughts: Three Tools to Renew Your Mind and Transform Your Life',
        ], [
            'short_description' => 'Learn how to control your thoughts and transform your life with biblical principles.',
            'long_description' => 'In this powerful book, Max Lucado offers practical tools to help readers take control of their thought life. Drawing from Scripture, he provides three simple yet effective methods to renew the mind and experience transformation. This guide is perfect for anyone struggling with anxiety, fear, or negative thinking patterns.',
            'author_id' => $author->id,
            'release_date' => '2025-08-12',
            'length' => 240,
            'scripture_references' => 'Romans 12:2, Philippians 4:8, 2 Corinthians 10:5',
            'reflection_questions' => '1. What thoughts dominate your mind most frequently?
2. How can you apply the principles in this book to your daily life?
3. Which Scripture verse speaks most powerfully to you about renewing your mind?',
            'scripture_database_link' => 'https://www.biblegateway.com/',
            'download_count' => 0,
            'last_downloaded_at' => null,
        ]);

        // Attach Genres (only if not already attached)
        foreach ($genreModels as $genre) {
            if (!$ebook->genres()->where('genre_id', $genre->id)->exists()) {
                $ebook->genres()->attach($genre->id);
            }
        }

        // Create SEO Meta
        $ebook->seoMeta()->create([
            'meta_title' => 'Tame Your Thoughts - Max Lucado - Christian Self-Help Book',
            'meta_description' => 'Transform your thought life with Max Lucado\'s practical guide to renewing your mind. Learn biblical principles to overcome anxiety and negative thinking.',
            'meta_keywords' => 'Max Lucado, Christian living, self-help, renew mind, anxiety, negative thoughts, biblical principles',
        ]);

        // Note: We won't create actual files in the seeder as that would require real file uploads
        // In a real application, you would upload files through the admin interface
    }
}