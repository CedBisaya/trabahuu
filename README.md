# Trabahuu 🎯

A minimalist job application tracking system. Trabahuu helps job seekers organize their job hunt with a clean, responsive UI, live data synchronization, and bulk Excel import capabilities.

## ✨ Features

* **Live Data Sync (No Refresh Needed):** Powered by Laravel Reverb, the dashboard listens for real-time WebSocket events. Additions, edits, or deletions are instantly reflected on the table globally without ever needing to refresh the page.
* **Real-Time Data Table:** Instant search and status filtering powered by Livewire, with custom-styled pagination.
* **Minimalist UI:** A clean, distraction-free interface built with Tailwind CSS, featuring soft slate and deep blue accents.
* **Bulk Excel Import:** Quickly populate your database by uploading `.xlsx` or `.csv` files using Laravel Excel.
* **Seamless Modals:** Add, edit, and delete applications without leaving the page, utilizing Alpine.js and Livewire event dispatching.

## 🛠️ Tech Stack

* **Backend:** PHP, Laravel, MySQL
* **Frontend:** Livewire 4, Alpine.js, Tailwind CSS, Blade Components
* **Packages:** 
  * `laravel/reverb` (WebSocket server for live updates)
  * `maatwebsite/excel` (Bulk data imports)
  * `blade-ui-kit/blade-heroicons` (SVG icons)

## 🚀 Installation & Setup

#### Follow these steps to clone the repository and run the project locally.

#### 1. Clone the repository: First, clone the project from your Git repository
```sh
    git clone https://github.com/CedBisaya/trabahuu.git
    cd trabahuu
```

#### 2. Install PHP and Node dependencies
```sh
    composer install
    npm install
```

#### 3. Environment Setup: Duplicate the .env.example file and rename it to .env.
```sh
    cp .env.example .env
```

#### 4. Generate your application key
```sh
    php artisan key:generate
```

#### 5. Database & Reverb Configuration
```sh
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=trabahuu_db
    DB_USERNAME=root
    DB_PASSWORD=

    BROADCAST_CONNECTION=reverb
```

#### 6.  Go to your XAMPP and create a database named "trabahuu_db", make sure your XAMPP server is running

#### 7. Run the migrations to create the database tables
```sh
    php artisan migrate
```

#### 8. Compile Assets & Start the Servers
```sh
    php artisan serve
    php artisan reverb:start
    npm run dev
```