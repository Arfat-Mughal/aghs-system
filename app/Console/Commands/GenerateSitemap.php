<?php

namespace App\Console\Commands;

use App\Models\Ebook;
use App\Models\Genre;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Generate public/sitemap.xml';

    public function handle()
    {
        $base = rtrim(config('app.url'), '/');
        $now = now()->toAtomString();

        $urls = [
            ['loc' => $base . '/',                    'lastmod' => $now, 'priority' => '1.0', 'changefreq' => 'daily'],
            ['loc' => $base . '/about-us',             'lastmod' => $now, 'priority' => '0.6', 'changefreq' => 'monthly'],
            ['loc' => $base . '/contact',              'lastmod' => $now, 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $base . '/courses',              'lastmod' => $now, 'priority' => '0.7', 'changefreq' => 'weekly'],
            ['loc' => $base . '/notice',               'lastmod' => $now, 'priority' => '0.6', 'changefreq' => 'daily'],
            ['loc' => $base . '/roll_no',              'lastmod' => $now, 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $base . '/result',               'lastmod' => $now, 'priority' => '0.5', 'changefreq' => 'monthly'],
            ['loc' => $base . '/privacy-policy',       'lastmod' => $now, 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $base . '/terms-of-service',     'lastmod' => $now, 'priority' => '0.3', 'changefreq' => 'yearly'],
            ['loc' => $base . '/ebooks',                'lastmod' => $now, 'priority' => '0.8', 'changefreq' => 'weekly'],
        ];

        Ebook::query()
            ->orderBy('id')
            ->get(['slug', 'updated_at'])
            ->each(function (Ebook $ebook) use (&$urls, $base, $now): void {
                $urls[] = [
                    'loc' => $base . '/ebooks/' . ltrim($ebook->slug, '/'),
                    'lastmod' => optional($ebook->updated_at)->toAtomString() ?? $now,
                    'priority' => '0.7',
                    'changefreq' => 'weekly',
                ];
            });

        Genre::query()
            ->whereNotNull('slug')
            ->where('slug', '!=', '')
            ->orderBy('id')
            ->get(['slug'])
            ->each(function (Genre $genre) use (&$urls, $base, $now): void {
                $urls[] = [
                    'loc' => $base . '/ebooks/genre/' . ltrim($genre->slug, '/'),
                    'lastmod' => $now,
                    'priority' => '0.6',
                    'changefreq' => 'weekly',
                ];
            });

        $xml = $this->buildSitemapXml($urls);
        File::put(public_path('sitemap.xml'), $xml);

        $this->info('sitemap.xml generated at public/sitemap.xml (' . count($urls) . ' URLs)');
        return self::SUCCESS;
    }

    private function buildSitemapXml(array $urls): string
    {
        $items = collect($urls)->map(function (array $url): string {
            $loc = e($url['loc']);
            $lastmod = e($url['lastmod']);
            $priority = e((string) $url['priority']);
            $changefreq = e($url['changefreq']);

            return <<<XML
  <url>
    <loc>{$loc}</loc>
    <lastmod>{$lastmod}</lastmod>
    <changefreq>{$changefreq}</changefreq>
    <priority>{$priority}</priority>
  </url>
XML;
        })->implode("\n");

        return <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
{$items}
</urlset>
XML;
    }
}
