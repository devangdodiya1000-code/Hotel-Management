🏨 Hotel Management System (Laravel 12)

A modern and efficient Hotel Management System built with Laravel 12. This project helps manage hotel operations such as room types, subtypes, bookings, and more through a clean admin interface.

🚀 Features
🏢 Manage Room Types & Subtypes
🛏️ Room Listing & Management
📋 Booking Management (if implemented)
🖼️ Image Upload Support
⚡ AJAX-based Dynamic Forms
🎨 Bootstrap 5 UI with Modal Support
✅ Form Validation with Error Handling
🔄 Reusable Add/Edit Modal System
🛠️ Tech Stack
Backend: Laravel 12
Frontend: Bootstrap 5, jQuery, AJAX
Database: MySQL
Server: Apache / Nginx
📦 Installation Guide

Follow these steps to set up the project locally:

1️⃣ Clone the Repository
git clone https://github.com/devangdodiya1000-code/Hotel-Management.git
cd Hotel-Management
2️⃣ Install Dependencies
composer install
npm install
npm run build
3️⃣ Setup Environment File
cp .env.example .env

Now update your .env file with database credentials:

DB_DATABASE=hotel_management
DB_USERNAME=root
DB_PASSWORD=
4️⃣ Generate Application Key
php artisan key:generate
5️⃣ Run Migrations
php artisan migrate
6️⃣ Start Development Server
php artisan serve

Now open your browser:

http://127.0.0.1:8000
📂 Project Structure Highlights
app/
 ├── Models/
 ├── Http/Controllers/
resources/
 ├── views/
routes/
 ├── web.php
database/
 ├── migrations/
📸 Screenshots

(Add your project screenshots here)

⚙️ Key Functional Modules
🔹 Type Management
Add, Edit, Delete Types
Active/Inactive Status
🔹 Subtype Management
Linked with Types
Image Upload Support
AJAX Form Submission
