# 🎓 EduGate Pakistan

**EduGate Pakistan** is a centralized web platform built to simplify the university admission journey for students across Pakistan. Instead of browsing dozens of university websites, students can explore admission deadlines, eligibility criteria, programs, and fee structures in one clean, searchable interface.

The project focuses on **clarity, accuracy, and ease of access**, making admission-related information available within seconds.

---

## ✨ Key Highlights

* Centralized admission information for Pakistani universities
* Clean, responsive, mobile‑friendly interface
* Secure and easy‑to‑use admin dashboard
* Scalable architecture built with Laravel

---

## 🚀 Features

### 🎓 Student Features (Public)

* **University Search**
  Search universities by **name** or **city**.

* **Detailed University Profiles**
  View admission deadlines, available programs, eligibility criteria, and fee details.

* **Responsive UI**
  Fully mobile‑friendly interface built with **Tailwind CSS**.

---

### 🛠️ Admin Features (Private)

* **Secure Admin Dashboard**
  Password‑protected admin panel.

* **University Management**
  Complete **CRUD** operations for universities, programs, and deadlines.

* **Admin Account Management**
  Existing admins can create new admin accounts directly from the dashboard.

* **Smart URL Handling**
  Automatically fixes university website links by appending `https://` when missing.

* **Dynamic Forms**
  Add unlimited programs and admission deadlines dynamically without page reloads.

---

## 🛠️ Tech Stack

* **Backend Framework:** Laravel (PHP)
* **Frontend:** Blade Templates + Tailwind CSS (CDN)
* **Database:** MySQL

---

## ⚙️ Installation & Setup

Follow the steps below to run the project locally.

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/BinaryVibe/edugate-pk.git
cd edugate-pk
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Environment Configuration

Create the environment file and generate the application key:

```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Database Setup

Update your database credentials inside the `.env` file:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=edugate_db
DB_USERNAME=root
DB_PASSWORD=
```

> ⚠️ Make sure the database exists before running migrations.

### 5️⃣ Run Migrations & Seeders

This will create all required tables and seed:

* **25 top Pakistani universities**
* **Default admin account**

```bash
php artisan migrate:fresh --seed
```

### 6️⃣ Start the Development Server

```bash
php artisan serve
```

Open your browser and visit:

```
http://127.0.0.1:8000
```

---

## 🔑 Admin Login Credentials

**Admin Login URL:**

```
http://127.0.0.1:8000/admin/login
```

**Default Admin Account:**

* **Email:** [admin@edugate.pk](mailto:admin@edugate.pk)
* **Password:** password

> 🔐 Change the default password after first login for security.

---

## 📂 Project Structure Overview

```
app/
 ├── Models/                 # Eloquent models
 └── Http/Controllers/       # Public & Admin controllers

resources/views/
 ├── universities/           # Public-facing views
 └── admin/                  # Admin dashboard views

database/seeders/
 ├── UniversitySeeder.php    # Dummy university data
 └── AdminSeeder.php         # Initial admin account
```

---

## 🌱 Future Enhancements

* Advanced filters (program type, degree level)
* University comparison feature
* User accounts for students
* PDF export for admission information

---

## 👋 Get in Touch

Let’s connect and collaborate:

🔗 **LinkedIn:** [Ayaan Ahmed Khan](https://www.google.com/search?q=https://www.linkedin.com/in/ayaan-ahmed-khan-448600351)

---

> EduGate Pakistan aims to make higher-education information transparent, accessible, and student-friendly across Pakistan.
