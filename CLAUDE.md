# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

Laravel 8 (PHP ^8.2) school management system for AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY (Lahore, Pakistan). Public site (admissions, courses, certificate/result verification, roll-no slips) plus an authenticated admin panel, and a newer e-book library module. Frontend is server-rendered Blade with Bootstrap, jQuery, and Alpine.js — no SPA framework.

## Commands

```bash
# Install
composer install
npm install

# Local dev
php artisan serve
npm run dev        # or: npm run watch (rebuild on change)
npm run prod        # production asset build

# Database
php artisan migrate
php artisan db:seed
php artisan storage:link   # required for uploaded certificate/ebook files to be publicly served

# Tests (PHPUnit, split into Unit/Feature suites)
php artisan test
php artisan test --testsuite=Feature
php artisan test --filter=RegistrationTest      # single test class
vendor/bin/phpunit tests/Feature/AuthenticationTest.php

# Code style (StyleCI config: Laravel preset, PHP)
phpcs
phpcbf
```

Note: `phpunit.xml` has DB_CONNECTION/DB_DATABASE (sqlite in-memory) commented out — tests currently run against whatever DB connection is configured in `.env`, not an isolated sqlite DB.

## Architecture

**Routing** (`routes/web.php`): all routes defined flat in one file, no route-model binding via resource controllers for the core domain (student/result/slip/certificate use manual `Route::get/post` pairs with string-based IDs, not implicit binding). Two route groups:
- Public routes at the top (home, courses, roll_no, result, notice, ebooks/*) — no auth.
- `admin` prefix group behind `auth` middleware containing the entire back-office: students, slips (date sheets), results, certificates, notifications, banners, fees, subjects, notes, grades, and the e-book system (ebooks/authors/genres).

Controllers live under `app/Http/Controllers/admin/*` for back-office logic and directly under `app/Http/Controllers/` for public-facing + auth (Breeze-scaffolded `Auth/*`) + the newer `EbookFrontendController`.

**Domain model shape** (`app/Models/*`): two eras of the app coexist:
- Original school-records domain: `Student`, `Grade` (class/grade level), `Subject`, `Slip` (date sheet), `Recode`/`RecodeMark` (result records and marks), `StudentRecodeCard`, `Certificate`/`CertificateContent`, `Fee`, `Payment`, `Notice`, `Notifications`, `Banner`, `Contact`.
- Newer e-book library domain (added ~2025-09-28 migrations): `Ebook`, `EbookFile`, `Author`, `Genre`, `Format`, `Review`, `Download`, `SeoMeta`, `Note` — largely independent of the student/result domain, with its own controllers and public frontend routes under `/ebooks`.

When working on results/slips, note the naming: "Slip" = exam date sheet, "Recode"/"RecodeMark" = result record/marks (not a typo to silently "fix" — it's the existing schema/model naming used throughout controllers and views).

**Operational routes to be aware of**: `routes/web.php` contains maintenance-style GET routes not gated behind admin auth in the same way as the rest of the panel — `/clear&optimize` (runs artisan cache/route/view clear + optimize) and `/setup-ebook-system` (runs a hardcoded list of ebook migrations + storage:link). These are deploy/ops helpers, not user-facing features; treat them as infrastructure code when touching migrations or cache config.

**Views** (`resources/views/`): Blade templates split into `admin/` (back-office), `auth/` (Breeze), `includes/` (shared partials), `layouts/`, and `pages/` (public marketing/site pages).

**Assets**: Laravel Mix (`webpack.mix.js`) compiles `resources/js/app.js` and `resources/css/app.css`, plus vendored Bootstrap CSS, into `public/js` / `public/css`. Static/public-facing assets (images, fonts, pre-built theme CSS/JS) live under `public/web_assets/`.

**Image uploads**: every uploaded image MUST go through `App\Services\ImageService` — `compressToPublic()` (writes into `public/<dir>`) or `compressToDisk()` (storage disk, default `public`). It downscales to `config('images.max_edge')`, auto-orients by EXIF, strips metadata, and re-encodes to WebP (`config/images.php`). Never call `->move()` / `->storeAs()` on an `UploadedFile` image directly. Exception: student photos pass `['format' => 'jpg']` because they are embedded into dompdf-generated PDFs (mark sheets / roll-no slips) and dompdf cannot reliably render WebP. Animated GIFs are detected and stored untouched.

**Key installed packages**: `artesaos/seotools` (meta tags/SEO), `barryvdh/laravel-dompdf` (PDF generation — likely certificates/result sheets/slips), `laravel/sanctum` (API auth), `fruitcake/laravel-cors`, `realrashid/sweet-alert` (JS alert UI), `kwn/number-to-words`, `intervention/image` v2 (GD driver — upload compression, see Image uploads above). Frontend deps: `bootstrap` 5, `alpinejs` 2, `laravel-mix` 6.
