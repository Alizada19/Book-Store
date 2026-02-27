# Bookstore Application

A modern bookstore application built with Laravel 12, featuring a clean design and categorized book listings.

## About the Project

This project is a web-based bookstore platform that allows users to browse books across various categories such as Fiction, Non-Fiction, and Science. It features a responsive design with smooth animations and an intuitive user interface.

## Tech Stack

- **Backend:** Laravel 12.42.0 (PHP 8.2+)
- **Frontend:** Bootstrap 5, Blade Templates, Vite
- **Database:** SQLite (default for development)
- **UI Enhancements:** Slick Slider, Animate On Scroll (AOS)
- **Icons:** Icomoon, FontAwesome

## Features

- **Categorized Listings:** Books are organized into sections like Fiction, Non-Fiction, and Science.
- **Responsive Slider:** Featured books are displayed in an interactive slider.
- **Animations:** Engaging entrance animations using AOS.
- **User Authentication:** Built-in authentication system (Laravel Breeze).
- **Search & Cart:** Basic structure for book searching and shopping cart (placeholder UI).

## Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM

### Installation

1.  **Clone the repository:**
    ```bash
    git clone <repository-url>
    cd bookstore-app
    ```

2.  **Install PHP dependencies:**
    ```bash
    composer install
    ```

3.  **Install NPM dependencies and compile assets:**
    ```bash
    npm install
    npm run build
    ```

4.  **Set up environment variables:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5.  **Initialize Database:**
    The project is pre-configured to use SQLite.
    ```bash
    touch database/database.sqlite
    php artisan migrate --seed
    ```

6.  **Run the application:**
    ```bash
    php artisan serve
    ```

## Development

To populate the database with sample data for testing the UI:
```bash
php artisan db:seed --class=BookSeeder
```

## Credits

- Template by [TemplatesJungle](https://templatesjungle.com)
