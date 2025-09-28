<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Format;

class FormatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formats = [
            [
                'name' => 'PDF',
                'extension' => '.pdf',
                'mime_type' => 'application/pdf'
            ],
            [
                'name' => 'EPUB',
                'extension' => '.epub',
                'mime_type' => 'application/epub+zip'
            ],
            [
                'name' => 'MOBI',
                'extension' => '.mobi',
                'mime_type' => 'application/x-mobipocket-ebook'
            ]
        ];

        foreach ($formats as $formatData) {
            Format::firstOrCreate(
                ['name' => $formatData['name']],
                $formatData
            );
        }
    }
}