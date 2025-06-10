# TravelEase - Travel Agency Website

A modern travel agency website built with Laravel that allows users to browse destinations, make bookings, and manage their travel plans.

## Features

- User authentication and authorization
- Browse travel destinations with detailed information
- Book tours with customizable options
- View booking history
- Admin dashboard for managing bookings and destinations
- Responsive design for all devices

## Requirements

- PHP >= 8.1
- Composer
- MySQL >= 5.7
- Node.js & NPM
- Git

## Quick Start Commands



1. Install dependencies:
```bash
composer install
npm install
```

2. Set up environment:
```bash
cp .env.example .env
php artisan key:generate
```

3. Configure database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=travelease
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

4. Set up database and storage:
```bash
php artisan migrate --seed
php artisan storage:link
```

5. Compile assets:
```bash
npm run dev
```

6. Run the website:
```bash
php artisan serve
```

Visit `http://127.0.0.1:8000/` in your browser

## Default Admin Login
- Email: admin@gmail.com
- Password: admin
