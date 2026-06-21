# Ayam Nusantara Victoria - Indonesian Restaurant Website

A premium, modern, responsive website built with **Laravel 12**, **Blade**, **Tailwind CSS**, **Alpine.js**, and **MySQL**.

## Features

- **Homepage**: Hero food banner, featured menu, customer reviews, dynamic coordinates.
- **About Us**: Narrative story, kitchen cleanliness, brand values.
- **Menu Page**: Live category filter, real-time search, and price boundary slide-filtering powered by **Alpine.js**.
- **Reviews**: Aggregated average rating (4.8/5), star percentage breakdown, and pagination.
- **Gallery**: Mansonry grid categorized visuals and image enlargement lightbox using **Alpine.js**.
- **Contact Us**: CSRF-protected contact form with validation, WhatsApp CTAs, Google Maps frame.
- **Admin Dashboard** (Laravel Breeze): Dynamic metrics, CRUD menus, reviews toggle, gallery manager, site configurations editor.

## Technical Stack & Architecture

- **Framework**: Laravel 12
- **Front-end**: Blade templates + Alpine.js + Tailwind CSS
- **Database**: MySQL / MariaDB
- **Patterns**: Repository Pattern + Service Layer + Slim MVC Controllers

---

## Installation Guide

Follow these commands to set up the project locally:

### 1. Install Dependencies
```bash
composer install
npm install
```

### 2. Configure Database & Environment
Copy the example environment file and configure your database parameters:
```bash
cp .env.example .env
php artisan key:generate
```

### 3. Run Migrations & Database Seeders
Build database tables and seed sample menus, reviews, settings, and the default admin user:
```bash
php artisan migrate --seed
```
* **Default Admin Account**:
  - **Email**: `admin@ayamnusantara.com`
  - **Password**: `password123`

### 4. Create Public Storage Symlink
```bash
php artisan storage:link
```

### 5. Build Front-End Assets
Compile CSS and Javascript using Vite:
```bash
npm run build
```

### 6. Run the Local Development Server
```bash
php artisan serve
```
Open your browser and navigate to `http://127.0.0.1:8000`.
- To view the Admin Panel, visit `http://127.0.0.1:8000/login` and use the admin credentials.
