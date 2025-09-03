# Mazaaq 🍽️

[![Last Commit](https://img.shields.io/github/last-commit/yourusername/mazaaq)]()
[![Languages](https://img.shields.io/github/languages/count/yourusername/mazaaq)]()
\[![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php\&logoColor=white)]
\[![Laravel](https://img.shields.io/badge/Laravel-10-red?logo=laravel\&logoColor=white)]
\[![Composer](https://img.shields.io/badge/Composer-2.5-ff69b4?logo=composer\&logoColor=white)]
\[![NPM](https://img.shields.io/badge/NPM-10-lightgrey?logo=npm\&logoColor=white)]
\[![MySQL](https://img.shields.io/badge/MySQL-8-blue?logo=mysql\&logoColor=white)]
\[![JavaScript](https://img.shields.io/badge/JS-ES6-yellow?logo=javascript\&logoColor=black)]
\[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple?logo=bootstrap\&logoColor=white)]

Mazaaq is a full-featured restaurant management and online ordering system built with **PHP** and **Laravel**. The project is divided into two main sections: the **Customer Frontend** and the **Admin Panel**. It comes with a complete restaurant menu, table booking system, cart and order management, and payment integration using **PayPal API**. The admin panel is powered by **Filament**, offering CRUD resources for every part of the system.

---

## 🛠 Tools & Technologies Used

* **Languages:** PHP, JavaScript, SQL
* **Frameworks / Libraries:** Laravel, Bootstrap
* **Package Managers:** Composer, NPM
* **Database:** MySQL
* **Admin Panel:** Filament
* **Payment:** PayPal API

---

## 📂 Project Features

### Customer Section

* Browse restaurant **menu items**.
* **Book tables** at the restaurant.
* Add items to the **cart** and place **orders**.
* Pay online securely via **PayPal API**.
* Contact the restaurant directly using the **contact form**.
* Submit **reviews** and rate .

### Admin Panel

* Built with **Filament** for fast backend management.
* Full CRUD **resources** for users, foods, bookings, orders, and reviews.
* Manage orders, bookings, and menu items efficiently.
* Dashboard with **stats and charts** for orders, users, bookings, and popular menu items.

---

## ⚡ Installation & Setup

1. Clone the repository:

```bash
git clone https://github.com/Menna-Baligh/Mazaaq.git
cd mazaaq
```

2. Install PHP dependencies using Composer:

```bash
composer install
```

3. Install frontend dependencies using NPM:

```bash
npm install
npm run dev
```

4. Copy `.env.example` to `.env` and set up your database and mail configuration:

```bash
cp .env.example .env
php artisan key:generate
```


5. Start the local development server:

```bash
php artisan serve
```

Now you can visit `http://127.0.0.1:8000` to see the application in action.

---

## 📊 Additional Notes

* The **Admin Panel** is fully responsive and organized with **Filament resources** for each model.
* The **dashboard** includes **stats widgets** for tracking users, orders, bookings, and popular foods.
* **Payment system** uses PayPal Sandbox for testing.

---


