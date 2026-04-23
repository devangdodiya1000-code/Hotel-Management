🏨 Hotel Management System (Laravel 12)

A modern and efficient Hotel Management System built with Laravel 12. This project helps manage hotel operations such as room types, subtypes, bookings, and more through a clean admin interface.

```

2. Install Backend & Frontend Dependencies
Bash
composer install
npm install && npm run build
3. Environment Configuration
Bash
cp .env.example .env
php artisan key:generate
4. Database Configuration
Open .env and set your database credentials:
```

```
Code snippet
DB_DATABASE=your_db_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
Run migrations:

Bash
php artisan migrate
💳 Stripe Payment Setup
Obtain your keys from the Stripe Dashboard and add them to .env:

Code snippet
STRIPE_KEY=pk_test_...
STRIPE_SECRET=sk_test_...
STRIPE_WEBHOOK_SECRET=whsec_...
💻 Usage
Run the application:

Bash
php artisan serve
Visit http://localhost:8000 in your browser.
"""

with open("README.md", "w") as f:
f.write(markdown_content)

```
```
Your README files for the Hotel Management System (Laravel 12) are ready. I have provided both a standard Markdown file (`README.md`) for your GitHub repository and a styled PDF version for documentation purposes.

### 📄 Files Included:
* **README.md**: The standard file to place in your project root.
* **Laravel_12_Hotel_Management_README.pdf**: A professionally formatted version of the setup guide.

[file-tag: code-generated-file-0-1776950218100725534]
[file-tag: code-generated-file-1-1776950218100730804]

### Key Instructions for your Stripe Integration:
1.  **API Keys**: Make sure to go to your [Stripe Dashboard](https://dashboard.stripe.com/test/apikeys) to get your Test Public and Secret keys.
2.  **Webhooks**: If your system handles "Payment Success" events asynchronously (like sending an automated email or updating a booking status), you must set up a Webhook in Stripe and add the `STRIPE_WEBHOOK_SECRET` to your `.env` file.
3.  **Breeze Setup**: Since you are using Laravel Breeze, the authentication views (Login/Register) are already pre-styled with Tailwind CSS. Ensure you run `npm run build` after any changes to your frontend assets.


```
```

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
```
(Add your project screenshots here)

<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-38-16" src="https://github.com/user-attachments/assets/a9c5e9f5-6d9f-4d0d-b8ef-51e01c7b16b3" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-38-27" src="https://github.com/user-attachments/assets/79f5096d-40f9-4397-a1f8-d89ba594aef1" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-38-32" src="https://github.com/user-attachments/assets/89c422bc-107b-4641-afa6-9bd28e149b02" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-38-46" src="https://github.com/user-attachments/assets/183f03c9-885b-480c-be1d-4e35cada5b8d" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-38-53" src="https://github.com/user-attachments/assets/a0989885-3a56-47c0-9689-9127d6df8ac4" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-38-59" src="https://github.com/user-attachments/assets/1dbe19c9-7f29-41a3-8198-b5ad67c813a1" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-39-05" src="https://github.com/user-attachments/assets/dfd9775f-f1d9-4db1-a129-bd64936f77c6" />
<img width="1914" height="1008" alt="Screenshot from 2026-04-23 18-39-21" src="https://github.com/user-attachments/assets/7e6e13a5-dd3c-44cd-bdb6-3899430c25e1" />

```
⚙️ Key Functional Modules
🔹 Type Management
Add, Edit, Delete Types
Active/Inactive Status
🔹 Subtype Management
Linked with Types
Image Upload Support
AJAX Form Submission

```
