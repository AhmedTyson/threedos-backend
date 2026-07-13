# <img src="https://api.iconify.design/lucide:clipboard-list.svg?color=%238A2BE2" width="32" align="top" /> Team 4 — ThreeDOS Backend — Task Session 9

![Status](https://img.shields.io/badge/status-active-10b981?style=flat-square)
![Role](https://img.shields.io/badge/role-Backend_Team-8A2BE2?style=flat-square)
![Stack](https://img.shields.io/badge/stack-Laravel_12-FF2D20?style=flat-square)
![Session](https://img.shields.io/badge/session-Task_9-4F5B93?style=flat-square)

<br />

RESTful API for **Tech Accessories E-commerce** built by **Team 4 Backend**. Delivers authenticated endpoints with JWT, role-based authorization (Admin/Customer), paginated collections, Redis caching, validated requests, and interactive API docs via Scramble. Frontend team consumes JSON responses at `/api/*`.

---

## <img src="https://api.iconify.design/lucide:list-checks.svg?color=%238A2BE2" width="24" align="top" /> Backend Requirements

### 1. Authentication Module

The system must provide a complete authentication module that includes:

- User registration (Sign Up)
- User login
- User logout
- JWT or token-based authentication
- Forgot Password functionality
- Password Reset using a secure reset token

### 2. Authorization

The application must implement authorization mechanisms to control access to resources. Requirements include:

- Role-Based Access Control (RBAC) or Permission-Based Authorization
- Different user roles (e.g., Admin, User)
- Protected routes based on user permissions
- Policies or Gates for resource ownership validation

### 3. Pagination

Endpoints returning collections of data must support pagination. Requirements include:

- Configurable page size
- Current page information
- Total number of records
- Total pages
- Navigation metadata (Next Page, Previous Page)
- Support for query parameters such as:
  - `page`
  - `per_page`

Example response metadata:

```json
{
  "current_page": 1,
  "per_page": 10,
  "total": 150,
  "last_page": 15
}
```

### 4. CRUD Modules

The system must implement CRUD operations for at least four modules.

### 5. Caching

The system must leverage caching mechanisms to improve performance. Requirements include:

- Caching of frequent database queries
- Cache invalidation on data updates
- Usage of Redis as the caching driver

### 6. API Documentation

The project must provide interactive API documentation.

---

## <img src="https://api.iconify.design/lucide:layers.svg?color=%238A2BE2" width="24" align="top" /> Tech Stack

| Layer | Technology |
|-------|-----------|
| Language | PHP 8.5.8 (ZTS) |
| Framework | Laravel 12 |
| Database | SQLite |
| Monitoring | Laravel Telescope |
| API Documentation | Dedoc Scramble |
| Authentication | JWT (tymon/jwt-auth) |
| Caching | Redis (predis/predis) |
| Testing | PHPUnit / Pest |

---

## <img src="https://api.iconify.design/lucide:folder-tree.svg?color=%238A2BE2" width="24" align="top" /> Project Structure

```
t4-3dos-backend-task9/
│
├── app/
│   ├── Enums/
│   ├── Http/Controllers/
│   ├── Models/
│   └── Providers/
│
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── routes/
├── storage/
├── tests/
│
├── composer.json
└── README.md
```

---

## <img src="https://api.iconify.design/lucide:terminal.svg?color=%238A2BE2" width="24" align="top" /> Quick Start

### Prerequisites

- PHP 8.5.8 (ZTS)
- Composer 2.x
- Redis Server 7+
- SQLite

### Installation

```bash
git clone https://github.com/AhmedTyson/t4-3dos-backend-task9.git
cd t4-3dos-backend-task9

composer install
copy .env.example .env
php artisan key:generate
php artisan jwt:secret
php artisan migrate --seed
```

### Available Commands

| Command | Description |
|---------|-------------|
| `composer run dev` | Start Laravel dev server |
| `composer run test` | Clear config & run tests |

### Redis Caching

Update `.env`:

```env
CACHE_STORE=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
```

---

## <img src="https://api.iconify.design/lucide:route.svg?color=%238A2BE2" width="24" align="top" /> Development Roadmap

| Phase | Status | Description |
|-------|--------|-------------|
| 1 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | Project setup, migrations, seeders, models |
| 2 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | Auth guard (JWT), enums, review fixes |
| 3 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | AuthController (register, login, logout, me, refresh) & Password Reset UI |
| 4 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | ProductController (CRUD, pagination, dynamic query filtration) |
| 5 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | CartController (show, add, update, remove) |
| 6 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | OrderController (transactional checkout, list, show, cancel) |
| 7 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | AdminController (manage users, orders, dynamic status transitions) |
| 8 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | Form request validation, policies, and gate authorizations |
| 9 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | Redis caching layer (`CacheJsonResponse` middleware) |
| 10 | <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310B981" width="18" align="text-bottom" /> Completed | API docs (Scramble), E2E Tests, PDF/XLSX Report Generation |

---

## <img src="https://api.iconify.design/lucide:sparkles.svg?color=%238A2BE2" width="24" align="top" /> Highlighted Features

- **Automated API Documentation**: Interactive, real-time OpenAPI docs available out-of-the-box via Dedoc Scramble.
- **Advanced Caching Middleware**: Custom `cache.json` middleware intercepts, caches, and automatically resolves API responses via Redis.
- **Beautiful Password Reset UI**: Features custom Tailwind CSS layouts, live JS requirement validation, and custom SVG animations replacing standard static blades.
- **Enterprise Reporting**: Implements PDF generation (via DOMPDF) and XLSX export (via OpenSpout) for sales reports and order receipts.
- **Transactional Integrity**: Cart-to-Order pipelines are wrapped in secure `DB::transaction()` blocks to guarantee data consistency.
- **Clean Architecture**: Razor-thin controllers leveraging Dedicated Resource Collections, FormRequests, and Eloquent Scopes.

---

## <img src="https://api.iconify.design/lucide:users.svg?color=%238A2BE2" width="24" align="top" /> Team 4

| Name | Role |
|------|------|
| Ahmed Elsayed (Ahmed Tyson) | Team Leader |
| Mohamed Osama | Co-Leader |
| Remas Ayman | Team Member |
| Sarah Mahmoud | Team Member |
| Fady Osama | Team Member |
| Youssef Hany | Team Member |
| Rana Medhat | Team Member |
| Sama Refaat | Team Member |

---

## <img src="https://api.iconify.design/lucide:building-2.svg?color=%238A2BE2" width="24" align="top" /> About ThreeDOS

ThreeDOS is a student-run initiative that replicates the structure and expectations of a professional software company. Members are assigned to functional departments (backend, frontend, design, product) and deliver real work under real constraints. The goal is to close the gap between academic learning and industry readiness.

> Organization: [github.com/Threedos](https://github.com/Threedos)

---

## <img src="https://api.iconify.design/lucide:user.svg?color=%238A2BE2" width="24" align="top" /> Author

**Ahmed Elsayed**
Team Leader — Backend Delegate @ ThreeDOS
[github.com/AhmedTyson](https://github.com/AhmedTyson)
