# 🎓 University Enrollment API

A **Laravel-based RESTful API** for managing students, courses, and enrollments with **authentication, role-based access control, and Swagger documentation**.

---

## 🚀 Features

* 🔐 **Authentication**

  * Laravel Passport (Bearer Token)
  * Register & Login APIs

* 🛡️ **Authorization**

  * Custom Role Middleware (`admin`, `student`)
  * Protected API routes

* 👨‍🎓 **Student Management**

  * Create students
  * View all students
  * Role assignment

* 📚 **Course Management**

  * Create courses
  * View courses

* 📝 **Enrollment System**

  * Students enroll in courses
  * Admin can view enrollments

* 📄 **API Documentation**

  * Swagger (OpenAPI)
  * Interactive API testing

* ⚙️ **Architecture**

  * Service Layer (Business Logic)
  * Traits for API responses
  * Clean Controller structure

* ⚡ **Queue System Ready**

  * Database queue setup for future email notifications

---

## 🛠️ Tech Stack

* PHP (Laravel Framework)
* Laravel Passport (Authentication)
* MySQL (Database)
* Swagger / OpenAPI (Documentation)

---

## ⚙️ Installation

### 1. Clone Repository

```bash
git clone https://github.com/your-username/university-api.git
cd university-api
```

---

### 2. Install Dependencies

```bash
composer install
```

---

### 3. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

---

### 4. Configure Database

Update `.env`:

```env
DB_DATABASE=university_api
DB_USERNAME=root
DB_PASSWORD=
```

---

### 5. Run Migrations

```bash
php artisan migrate
```

---

### 6. Install Passport

```bash
php artisan passport:install
```

---

### 7. Run Server

```bash
php artisan serve
```

---

## 🔐 Authentication Flow

1. Register user:

```
POST /api/register
```

2. Login:

```
POST /api/login
```

3. Get token:

```
Bearer TOKEN
```

4. Use token in headers:

```
Authorization: Bearer YOUR_TOKEN
```

---

## 📚 API Endpoints

### 🔓 Public Routes

| Method | Endpoint      | Description   |
| ------ | ------------- | ------------- |
| POST   | /api/register | Register user |
| POST   | /api/login    | Login user    |

---

### 🔒 Protected Routes

#### 👨‍🎓 Student Role

| Method | Endpoint     | Description      |
| ------ | ------------ | ---------------- |
| GET    | /api/courses | View courses     |
| POST   | /api/enroll  | Enroll in course |

---

#### 🛡️ Admin Role

| Method | Endpoint         | Description      |
| ------ | ---------------- | ---------------- |
| GET    | /api/students    | View students    |
| POST   | /api/students    | Create student   |
| POST   | /api/courses     | Create course    |
| GET    | /api/enrollments | View enrollments |

---

## 📄 API Documentation (Swagger)

Access Swagger UI:

```
http://127.0.0.1:8000/api/documentation
```

---

## 🧪 Testing

Use:

* Swagger UI (recommended)
* Postman

---

## ⚙️ Queue Setup (Optional)

```bash
php artisan queue:table
php artisan migrate
php artisan queue:work
```

---

## 🧠 Project Structure

```
app/
 ├── Http/
 │   ├── Controllers/API
 │   ├── Middleware
 ├── Models
 ├── Services
 ├── Traits
```

---

## 🎯 Future Improvements

* 📧 Email notifications on enrollment
* 💳 Payment system
* 📊 Admin dashboard
* 🔄 Repository pattern implementation

---

## 👨‍💻 Author

Ali Hassan

---

## 📜 License

This project is open-source and available under the MIT License.
