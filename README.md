# Laravel Blog & Comment System Project
A clean and responsive Full-Stack Blog Website built using **PHP Laravel Framework** and **Bootstrap CSS**.

I built this to get comfortable with user authentication, database relationships, and handling forms securely.

##  Features

-**Write, Edit, & Delete Posts:** Standard CRUD features for blog posts.
- **Interactive Comments:** Users can leave comments on any blog post.
-*Smart Deletion:** I set up a security check so you can *only* delete comments that you actually wrote.
- **User Logins:** Using by `laravel/ui`.
-  **Fake Data Generator:** It’s fully wired up with Laravel Factories and Seeders, meaning you can generate a bunch of fake posts and comments instantly to test things out.

- **Backend:** PHP & Laravel
- **Frontend:** HTML, Bootstrap CSS
- **Database:** SQLite (easy to set up locally)

- If you want to download this project ,open your terminal and run these steps:

### 1. Clone the project and jump into the folder
```bash
git clone https://github.com/EvilDemo127/blog_project_laravel.git
cd blog_project_laravel
```

### 2. Install the dependencies
```bash
composer install laravel/ui
npm install && npm run dev
```


### 3. Build the database and load it with fake posts/comments
```bash
php artisan migrate:fresh --seed
```

### 4. Fire up the local server!
```bash
php artisan serve
```
open your browser and go to `http://127.0.0.1:8000/`. 
