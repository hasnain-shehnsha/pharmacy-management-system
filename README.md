# 💊 Pharmacy Management System (Laravel)

A robust web-based **Pharmacy Management System** built with Laravel. This system includes role-based panels for **Admins** and **Pharmacists**, and manages customers, medicines, shippers, and sales with intuitive dashboards.

---

## 🚀 Features

### 👨‍⚕️ Admin Panel

* Manage Pharmacists
* Manage Medicines (CRUD)
* Manage Customers
* Manage Shippers
* View & analyze Sales records
* Dashboard with total stats

### 🧑‍🔬 Pharmacist Panel

* View and manage assigned medicines
* Handle sales and issue medicines
* View assigned customer records
* View individual sales history

### 👥 Customer Management

* Register and manage customers
* Track customer purchase history

### 💊 Medicine Inventory

* Add/edit/delete medicine records
* Monitor stock levels


### 📦 Shipper Management

* Assign shippers to medicine deliveries

### 📊 Sales & Dashboard

* Visual dashboard with key metrics
* View daily/monthly/yearly sales


---

## 🧰 Tech Stack

| Layer    | Technology             |
| -------- | ---------------------- |
| Backend  | Laravel 10.x           |
| Frontend | Blade Templates        |
| Database | MySQL                  |
| Auth     | Built-in Auth          |


---

## ⚙️ Setup Instructions

1. Clone the repository:

   ```bash
   git clone https://github.com/YOUR-USERNAME/pharmacy-management.git
   cd pharmacy-management
   ```

2. Install dependencies:

   ```bash
   composer install
   npm install && npm run dev
   ```

3. Copy `.env` and configure:

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Set your database credentials in `.env`

5. Run migrations:

   ```bash
   php artisan migrate
   ```

6. Start server:

   ```bash
   php artisan serve
   ```

---

## 📸 Screenshots

> Add UI screenshots in a `/screenshots` folder and embed them here.

---

## 👤 Roles

| Role       | Description                         |
| ---------- | ----------------------------------- |
| Admin      | Full control over app               |
| Pharmacist | Limited access to sales & inventory |

---

