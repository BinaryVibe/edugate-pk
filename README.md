
# 🎓 EduGate Pakistan

**EduGate Pakistan** is a centralized web portal designed to simplify the university admission process for students in Pakistan. It aggregates admission deadlines, program criteria, and fee structures from top universities into a single, searchable platform.

## 🚀 Features

### For Students (Public)
* **University Search:** Filter universities by Name or City.
* **Detailed Profiles:** View admission deadlines, available programs, and eligibility criteria.
* **AI Student Counselor:** A built-in AI tool (powered by Google Gemini) that recommends universities based on a student's marks and interests.
* **Responsive Design:** Fully mobile-friendly UI built with Tailwind CSS.

### For Admins (Private)
* **Secure Dashboard:** Password-protected admin panel.
* **University Management:** Full CRUD (Create, Read, Update, Delete) capabilities.
* **Dynamic Forms:** Add unlimited Deadlines and Programs dynamically using JavaScript.

## 🛠️ Tech Stack

* **Framework:** Laravel (PHP)
* **Frontend:** Blade Templates + Tailwind CSS (via CDN)
* **Database:** MySQL
* **AI Integration:** Google Gemini API

## ⚙️ Installation Guide

Follow these steps to set up the project on your local machine.

### 1. Clone the Repository
```bash
git clone https://github.com/BinaryVibe/edugate-pk.git
cd edugate-pk
````

### 2\. Install Dependencies

```bash
composer install
```

### 3\. Environment Setup

Rename the example environment file and generate the application key.

```bash
cp .env.example .env
php artisan key:generate
```

### 4\. Configure Database

Open the `.env` file and update your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=edugate_db  # Make sure this DB exists in phpMyAdmin
DB_USERNAME=root
DB_PASSWORD=
```

### 5\. Setup AI (Optional)

To use the AI Counselor feature, add your Google Gemini API Key to the `.env` file:

```env
GEMINI_API_KEY="your-google-api-key-here"
```

### 6\. Run Migrations & Seeders

This command will create all tables and populate the database with **25 Pakistani Universities** and the **Admin Account**.

```bash
php artisan migrate:fresh --seed
```

### 7\. Run the Server

```bash
php artisan serve
```

Visit `http://127.0.0.1:8000` in your browser.

## 🔑 Login Credentials

**Admin Panel:** `http://127.0.0.1:8000/admin/login`

  * **Email:** `admin@edugate.pk`
  * **Password:** `password`

## 📂 Project Structure

  * `app/Models` - Eloquent models (University, AdmissionDeadline, Program).
  * `app/Http/Controllers` - Logic for Public, Admin, and AI routes.
  * `resources/views/universities` - Public facing views.
  * `resources/views/admin` - Admin panel views.
  * `database/seeders` - Contains `UniversitySeeder` (Dummy Data) and `AdminSeeder`.

-----

**Developed by Syntax Syndicate**
