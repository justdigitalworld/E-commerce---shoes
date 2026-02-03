Installation Guide
Follow these steps to set up the project locally.

1. Install Frontend Dependencies
Download all the necessary Node.js packages required for the frontend.

Bash
npm install
2. Compile Assets
Build the frontend assets (CSS/JS). Use dev for development or build for production.

Bash
npm run build
3. Install Backend Dependencies
Use Composer to install the PHP dependencies.

Bash
composer install
4. Database Migration
Run the database migrations to create the necessary table structures. Ensure your .env file is configured with your database credentials before running this.

Bash
php artisan migrate
5. Link Storage
Create a symbolic link from public/storage to storage/app/public to make uploaded files accessible via the web.

Run to the server
php artisan serve

Bash
php artisan storage:link
Pro-Tips for your README:
Environment Variables: It’s a good idea to remind users to copy their .env.example to .env and run php artisan key:generate.
