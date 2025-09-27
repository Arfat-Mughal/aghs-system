# AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY

A comprehensive school management system built with Laravel and Blade templating engine.

## Overview

This is a full-featured educational management system designed for AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY, located in Lahore, Pakistan. The system provides a complete solution for managing students, courses, certificates, results, and online admissions.

## Features

### 🏫 School Management
- Student registration and management
- Course enrollment and tracking
- Certificate verification system
- Academic results management
- Online admission system

### 📚 Course Management
- Short courses (3-month and 6-month programs)
- Certificate programs
- Course duration tracking
- Online certificate verification

### 🎓 Academic Features
- Student roll number slip generation
- Result management system
- Grade management
- Subject-wise marks tracking
- Online result viewing

### 📱 Web Features
- Responsive design with Bootstrap
- Modern UI with custom styling
- Google Analytics integration
- Google Tag Manager integration
- SEO optimized meta tags
- Social media integration

### 🔐 Authentication & Security
- Laravel authentication system
- Admin dashboard access
- Secure certificate verification
- SSL encrypted forms

## Technology Stack

- **Backend**: Laravel PHP Framework
- **Frontend**: Blade Templating Engine
- **Styling**: Bootstrap 4, Custom CSS
- **JavaScript**: jQuery, Vanilla JS
- **Database**: MySQL
- **Icons**: IonIcons, Flaticon
- **Analytics**: Google Analytics, Google Tag Manager

## Installation

1. Clone the repository
```bash
git clone <repository-url>
cd aghs-system
```

2. Install dependencies
```bash
composer install
npm install
```

3. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

4. Database setup
```bash
php artisan migrate
php artisan db:seed
```

5. Storage link
```bash
php artisan storage:link
```

6. Start the development server
```bash
php artisan serve
```

## Directory Structure

```
aghs-system/
├── app/                    # Laravel application code
├── bootstrap/             # Laravel bootstrap files
├── config/                # Configuration files
├── database/              # Database migrations and seeders
├── public/                # Public web assets
│   └── web_assets/        # CSS, JS, images, fonts
├── resources/             # Views, SCSS, and other assets
│   └── views/             # Blade templates
│       ├── admin/         # Admin panel views
│       ├── auth/          # Authentication views
│       ├── includes/      # Reusable components
│       ├── layouts/       # Main layout templates
│       └── pages/         # Public pages
├── routes/                # Route definitions
├── storage/               # File storage
└── tests/                 # Test files
```

## Key Components

### Public Pages
- **Home**: Landing page with school information
- **About Us**: School details and mission
- **Courses**: Available certificate programs
- **Certificate Verification**: Online certificate verification system
- **Roll No Slip**: Student roll number slip generation
- **Results**: Academic results viewing
- **Contact**: Contact information and form

### Admin Features
- **Dashboard**: Admin control panel
- **Student Management**: Add, update, view students
- **Results Management**: Enter and manage student results
- **Certificate Management**: Issue and verify certificates
- **Notice Management**: Post school notices

## Configuration

### Google Services
- Google Analytics: Tracking and analytics
- Google Tag Manager: Marketing and conversion tracking
- Google AdSense: Monetization

### Contact Information
- **Address**: VILLAGE BHANO CHAK P/O WAGHA TEHSIL SHALIMAR CANTT LAHORE
- **Email**: info@aghslahore.pk
- **Phone**: 0321-4960275, 0321-4969849, 042-37172500

## Development

### Building Assets
```bash
npm run dev      # Development build
npm run prod     # Production build
npm run watch    # Watch for changes
```

### Code Quality
```bash
php artisan inspire    # Generate inspirational code
phpcs                 # Check coding standards
phpcbf               # Fix coding standards
```

## Deployment

1. Set up production environment
2. Configure `.env` file with production settings
3. Run database migrations
4. Build production assets
5. Set up web server (Apache/Nginx)
6. Configure SSL certificate
7. Set up cron jobs for scheduled tasks

## Support

For technical support or inquiries:
- Email: info@aghslahore.pk
- Phone: 0321-4960275, 0321-4969849, 042-37172500

## License

This project is proprietary software developed for AL-FALAH GRAMMAR HIGH SCHOOL & ACADEMY.

---

*Built with ❤️ using Laravel and modern web technologies*
 
