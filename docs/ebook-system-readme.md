# E-Book Management System

This is a comprehensive E-Book management system for the admin panel with full CRUD functionality, file uploads, and analytics.

## Features

### E-Books
- Full CRUD operations (Create, Read, Update, Delete)
- Cover image upload
- Multiple file format support (PDF, EPUB, MOBI)
- SEO meta data management
- Download tracking with counts
- Genre tagging (many-to-many relationship)
- Author association (many-to-one relationship)

### Authors
- Full CRUD operations
- Author image upload
- Bio information
- Associated ebooks listing

### Genres
- Full CRUD operations
- Genre description
- Associated ebooks listing

### Analytics
- Popular ebooks by download count
- Recent downloads tracking
- Download count per ebook

### Admin Interface
- Responsive admin views using existing CSS
- Paginated lists (20 items per page)
- Search and filtering capabilities
- Genre sidebar with random genres and counts
- File management within ebook editing

## Installation

### Option 1: Command Line (Recommended for Development)
1. Run migrations:
```bash
php artisan migrate
```

2. Run seeders (optional):
```bash
php artisan db:seed --class=EbookSeeder
php artisan db:seed --class=FormatSeeder
```

3. Link storage for file access:
```bash
php artisan storage:link
```

4. Set environment variables:
- Ensure `FILESYSTEM_DRIVER=public` in your `.env` file

### Option 2: One-Click Setup (Recommended for Deployment)
Visit this URL once after deployment:
```
http://yourdomain.com/setup-ebook-system
```

This will automatically:
- ✅ Run all ebook system migrations
- ✅ Create storage symbolic link
- ✅ Seed database with sample data
- ✅ Verify all components are working

### System Status Check
Check system health at:
```
http://yourdomain.com/admin/ebooks-system-status
```

This page shows:
- Database table status
- Storage configuration
- Sample data counts
- Component health indicators

## Usage

### Admin Routes
- List ebooks: `/admin/ebooks`
- Create ebook: `/admin/ebooks/create`
- Edit ebook: `/admin/ebooks/{ebook}/edit`
- View ebook: `/admin/ebooks/{ebook}`
- Delete ebook: DELETE `/admin/ebooks/{ebook}`

- Upload files: POST `/admin/ebooks/{ebook}/upload-files`
- Delete file: DELETE `/admin/ebooks/files/{file}`
- Download file: GET `/admin/ebooks/files/{file}/download`

- Popular ebooks: `/admin/ebooks-analytics/popular`
- Recent downloads: `/admin/ebooks-analytics/recent-downloads`
- System status: `/admin/ebooks-system-status`

### Deployment Routes (Run Once)
- **One-click setup**: `/setup-ebook-system` (Runs all migrations, seeders, and creates storage link)

### Authors
- List authors: `/admin/authors`
- Create author: `/admin/authors/create`
- Edit author: `/admin/authors/{author}/edit`
- View author: `/admin/authors/{author}`
- Delete author: DELETE `/admin/authors/{author}`

### Genres
- List genres: `/admin/genres`
- Create genre: `/admin/genres/create`
- Edit genre: `/admin/genres/{genre}/edit`
- View genre: `/admin/genres/{genre}`
- Delete genre: DELETE `/admin/genres/{genre}`

## File Storage

Files are stored in the `public` disk:
- Cover images: `storage/uploads/ebooks/covers/`
- Ebook files: `storage/uploads/ebooks/{ebook_id}/`

## Database Structure

### Tables
1. `ebooks` - Main ebook information
2. `authors` - Ebook authors
3. `genres` - Ebook genres/tags
4. `ebook_genre` - Pivot table for many-to-many relationship
5. `ebook_files` - Uploaded files (PDF, EPUB, MOBI)
6. `seo_meta` - SEO metadata (polymorphic)
7. `reviews` - Ebook reviews
8. `downloads` - Download tracking
9. `formats` - File format definitions

## Models

All models include proper relationships:
- Ebook ↔ Author (many-to-one)
- Ebook ↔ Genre (many-to-many)
- Ebook ↔ Files (one-to-many)
- Ebook ↔ Reviews (one-to-many)
- Ebook ↔ SEO Meta (one-to-one)
- Ebook ↔ Downloads (one-to-many)

## Validation

Form requests provide validation for:
- Ebook creation/update
- Author creation/update
- Genre creation/update
- Review creation/update

## Optimization

See `ebook-system-optimization.md` for detailed optimization notes including:
- Database indexes
- Query optimization
- Caching recommendations
- Security considerations

## Customization

The system uses the existing CSS framework. All views extend `layouts.adminLayout` and can be customized to match your specific design requirements.