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



<img width="1906" height="885" alt="Screenshot 2026-02-03 134206" src="https://github.com/user-attachments/assets/cf047058-5375-4b16-8287-4d1477f4994a" />



<img width="1486" height="723" alt="Screenshot 2026-02-03 134224" src="https://github.com/user-attachments/assets/0709bf03-5302-458a-8404-494b18283687" />

<img width="1503" height="509" alt="Screenshot 2026-02-03 134239" src="https://github.com/user-attachments/assets/59974971-618b-4b88-ba9f-262f59be774e" />

<img width="953" height="637" alt="Screenshot 2026-02-03 134310" src="https://github.com/user-attachments/assets/081366da-b11a-4ba0-9e8c-55f2a42d5f57" />

<img width="1911" height="912" alt="Screenshot 2026-02-03 134355" src="https://github.com/user-attachments/assets/af7d598d-b38d-4e71-ae6a-50a17d4174f6" />
