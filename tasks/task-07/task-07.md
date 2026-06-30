# <img src="https://api.iconify.design/lucide:clipboard-list.svg?color=%238A2BE2" width="32" align="top" /> Session 8 — Task: To-Do List Management System

## <img src="https://api.iconify.design/lucide:book-open.svg?color=%238A2BE2" width="24" align="top" /> Overview

A RESTful API for a To-Do List management system built with **Laravel 11**. The system consists of two modules — **Category** (organizes tasks into groups) and **Task** (individual to-do items belonging to a category). All database interaction uses **Eloquent ORM** with **Laravel Migrations**.

---

## <img src="https://api.iconify.design/lucide:list-checks.svg?color=%238A2BE2" width="24" align="top" /> System Requirements

- **Category** — organizes tasks into groups
- **Task** — represents a single to-do item belonging to a category
- No authentication or role management required
- JSON responses throughout
- Eloquent ORM only — no raw SQL
- Laravel Migrations for all tables

---

## <img src="https://api.iconify.design/lucide:layout-template.svg?color=%238A2BE2" width="24" align="top" /> Architecture & Technical Decisions

### Folder Structure

```
backend/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── CategoryController.php
│   │   │   └── TaskController.php
│   │   ├── Requests/
│   │   │   ├── StoreCategoryRequest.php
│   │   │   ├── StoreTaskRequest.php
│   │   │   ├── UpdateCategoryRequest.php
│   │   │   └── UpdateTaskRequest.php
│   │   └── Resources/
│   │       ├── CategoryResource.php
│   │       └── TaskResource.php
│   ├── Models/
│   │   ├── Category.php
│   │   ├── Task.php
│   │   └── User.php
│   └── Providers/
├── database/
│   ├── migrations/
│   │   ├── 2026_06_30_004940_create_categories_table.php
│   │   └── 2026_06_30_005102_create_tasks_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── CategorySeeder.php
│       └── TaskSeeder.php
└── routes/
    └── api.php
```

### Key Decisions

- **Form Requests** — Validation extracted into dedicated classes (`app/Http/Requests/`) for separation of concerns and automatic 422 error responses.
- **API Resources** — Transformation layer (`app/Http/Resources/`) ensures consistent JSON structure across all endpoints.
- **Eloquent Relationships** — `Category hasMany Task` / `Task belongsTo Category` with eager loading via `->with("category")`.
- **Seeders** — `CategorySeeder` and `TaskSeeder` populate the database with realistic sample data for testing.

---

## <img src="https://api.iconify.design/lucide:database.svg?color=%238A2BE2" width="24" align="top" /> Database Schema

### Categories Table
| Column | Type | Constraints |
|--------|------|-------------|
| id | bigint, auto-increment | Primary Key |
| name | varchar(50) | Unique, nullable |
| description | varchar(500) | Nullable |
| created_at | timestamp | useCurrent |
| updated_at | timestamp | Nullable |

### Tasks Table
| Column | Type | Constraints |
|--------|------|-------------|
| id | bigint, auto-increment | Primary Key |
| category_id | bigint, FK | Nullable, references `categories(id)` ON DELETE CASCADE |
| title | varchar(100) | Nullable |
| description | text | Nullable |
| due_date | date | Nullable |
| is_completed | boolean | Default false |
| created_at | timestamp | useCurrent |
| updated_at | timestamp | Nullable |

---

## <img src="https://api.iconify.design/lucide:file-json.svg?color=%238A2BE2" width="24" align="top" /> API Documentation

### Categories (`/api/categories`)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/categories` | List all categories |
| POST | `/api/categories` | Create category |
| GET | `/api/categories/{id}` | Get category details |
| PUT/PATCH | `/api/categories/{id}` | Update category |
| DELETE | `/api/categories/{id}` | Delete category (cascades tasks) |

**Validation:**
- `name` — required, string, max 50, unique
- `description` — nullable, string, max 500

### Tasks (`/api/tasks`)

| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/tasks` | List all tasks (with category) |
| POST | `/api/tasks` | Create task |
| GET | `/api/tasks/{id}` | Get task details |
| PUT/PATCH | `/api/tasks/{id}` | Update task |
| DELETE | `/api/tasks/{id}` | Delete task |

**Validation:**
- `category_id` — nullable, exists:categories,id
- `title` — required, string, max 100, unique
- `description` — nullable, string, max 300
- `due_date` — nullable, date
- `is_completed` — boolean

### Error Handling

| Status Code | Description |
|:------------|:------------|
| 200 OK | Request succeeded |
| 201 Created | Resource created |
| 404 Not Found | Resource not found |
| 422 Unprocessable | Validation failed |
| 500 Server Error | Unhandled exception |

---

## <img src="https://api.iconify.design/lucide:settings.svg?color=%238A2BE2" width="24" align="top" /> Setup & Operations

```bash
# 1. Navigate to backend
cd backend

# 2. Install dependencies
composer install

# 3. Copy environment
cp .env.example .env

# 4. Start server
php artisan serve

# 5. Wipe & seed database (via HTTP)
curl http://127.0.0.1:8000/api/setup/seed
```

---

## <img src="https://api.iconify.design/lucide:download.svg?color=%238A2BE2" width="24" align="top" /> Postman Collection

A fully configured Postman collection is available:

<img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[`backend/ToDoList_Postman_Collection.json`](backend/ToDoList_Postman_Collection.json)**

---

## <img src="https://api.iconify.design/lucide:layers.svg?color=%238A2BE2" width="24" align="top" /> Tech Stack

| Layer | Technology |
| ----- | ---------- |
| Framework | Laravel 11 |
| Language | PHP 8.x |
| Database | SQLite / MySQL |
| ORM | Eloquent |
| API Resources | Laravel API Resources |
| Debugging | Laravel Telescope + Vue 3 Dashboard |

---

## <img src="https://api.iconify.design/lucide:link.svg?color=%238A2BE2" width="24" align="top" /> Repository

> <img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[AhmedTyson/threedos-backend — `tasks/task-07/`](https://github.com/AhmedTyson/threedos-backend/tree/main/tasks/task-07)**
