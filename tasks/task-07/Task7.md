# <img src="https://api.iconify.design/lucide:clipboard-list.svg?color=%238A2BE2" width="32" align="top" /> Task 07: To-Do List Management System

## <img src="https://api.iconify.design/lucide:book-open.svg?color=%238A2BE2" width="24" align="top" /> Brief

A RESTful API for a To-Do List system built with Laravel. The system consists of two modules — **Category** (organizes tasks into groups) and **Task** (individual to-do items belonging to a category).

---

## <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%238A2BE2" width="24" align="top" /> Deliverables

### Module 1: Categories
> **Objective:** Full CRUD for categories with validation.

**Status:** Completed <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310b981" width="18" align="text-bottom" />

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/categories` | GET | List all categories |
| `/api/categories/{id}` | GET | Get single category |
| `/api/categories` | POST | Create category |
| `/api/categories/{id}` | PUT/PATCH | Update category |
| `/api/categories/{id}` | DELETE | Delete category |

**Validation:**
- `name` — required, string, max 50, unique
- `description` — nullable, string, max 500

**Source code:**
<img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[`backend/app/Http/Controllers/CategoryController.php`](backend/app/Http/Controllers/CategoryController.php)**
<img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[`backend/app/Models/Category.php`](backend/app/Models/Category.php)**

---

### Module 2: Tasks
> **Objective:** Full CRUD for tasks linked to categories.

**Status:** Completed <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310b981" width="18" align="text-bottom" />

| Endpoint | Method | Description |
|----------|--------|-------------|
| `/api/tasks` | GET | List all tasks (with category) |
| `/api/tasks/{id}` | GET | Get single task |
| `/api/tasks` | POST | Create task |
| `/api/tasks/{id}` | PUT/PATCH | Update task |
| `/api/tasks/{id}` | DELETE | Delete task |

**Validation:**
- `category_id` — nullable, exists:categories,id
- `title` — required, string, max 100, unique
- `description` — nullable, string, max 300
- `due_date` — nullable, date
- `is_completed` — boolean

**Source code:**
<img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[`backend/app/Http/Controllers/TaskController.php`](backend/app/Http/Controllers/TaskController.php)**
<img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[`backend/app/Models/Task.php`](backend/app/Models/Task.php)**

---

### Postman Collection
> **Objective:** Complete Postman collection with all endpoints organized and named clearly.

**Status:** Completed <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310b981" width="18" align="text-bottom" />

<img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[`backend/ToDoList_Postman_Collection.json`](backend/ToDoList_Postman_Collection.json)**

---

## <img src="https://api.iconify.design/lucide:layers.svg?color=%238A2BE2" width="24" align="top" /> Tech Stack

| Layer | Technology |
| ----- | ---------- |
| Framework | Laravel 11 |
| Language | PHP 8.x |
| Database | MySQL (SQLite for testing) |
| ORM | Eloquent |
| API Resources | Laravel API Resources |
| Frontend | Telescope Dashboard UI (Vue 3) |

---

## <img src="https://api.iconify.design/lucide:folder-tree.svg?color=%238A2BE2" width="24" align="top" /> Project Structure

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
│   │   ├── create_categories_table.php
│   │   └── create_tasks_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── CategorySeeder.php
│       └── TaskSeeder.php
└── routes/
    └── api.php
```

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

## <img src="https://api.iconify.design/lucide:link.svg?color=%238A2BE2" width="24" align="top" /> Repository

> <img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[AhmedTyson/threedos-backend — `tasks/task-07/`](https://github.com/AhmedTyson/threedos-backend/tree/main/tasks/task-07)**

---

### Notes
- All endpoints return JSON with `status`, `message`, and `data` structure
- Full Eloquent ORM — no raw SQL queries
- All database interaction uses Laravel Migrations
- Category-Task relationship: `hasMany` / `belongsTo`
- Tasks eager-load category data via `->with("category")`
- Form Request classes handle validation with proper update-exception rules
- API Resources transform model data into consistent JSON responses
- Dev route `/api/setup/seed` available to re-seed the database
