# Laravel Project Setup

This guide outlines the steps to set up and run a Laravel project locally.

## Step 1: Update Composer and Create .env File

Update Composer and rename the .env.example file to .env:

```bash
composer update
cp .env.example .env

Step 2: Set Up the Database
Create a database in PHPMyAdmin named 'laravel'.

Step 3: Run Migrations
Run the database migrations to create the necessary tables:

php artisan migrate


Step 4: Start the Laravel Server
Start the Laravel development server:

php artisan serve


Step 5: Access the Application
Copy the server URL (usually http://127.0.0.1:8000/) into your browser to access the application.