# GreenEco — Semi-Conference Project

> **ThreeDOS Semi-Conference Submission**
> Backend API for the GreenEco recycling platform, built by Team 3.

---

## Table of Contents

- [Overview](#overview)
- [PRD](#prd)
- [Repository](#repository)
- [Tech Stack](#tech-stack)
- [Architecture](#architecture)
- [Modules](#modules)
- [API Endpoints](#api-endpoints)
- [Postman Collection](#postman-collection)
- [Database](#database)
- [Setup](#setup)
- [Testing](#testing)
- [Team](#team)

---

## Overview

**GreenEco** is a smart recycling platform that connects citizens with recycling services through scheduled pickups, real-time tracking, a points-based rewards system, and an admin dashboard for managing operations end-to-end.

| Item | Detail |
|------|--------|
| Project | GreenEco — Smart Recycling Platform |
| Scope | Semi-Conference (Backend) |
| Framework | Laravel 12 |
| Auth | JWT (`tymon/jwt-auth`) |
| Roles | Admin, User, Driver |
| Deployment | Railway (Docker) |
| Fork | [AhmedTyson/Team3-backend-GreenEco](https://github.com/AhmedTyson/Team3-backend-GreenEco) |
| Original | [shahdxz5/Team3-backend](https://github.com/shahdxz5/Team3-backend) |

---

## PRD

The full Product Requirements Document is extracted from the original business documentation.

**[→ View PRD](docs/PRD.md)**

Key sections covered:

| # | Section |
|---|---------|
| 1 | Project Overview |
| 2 | Problem Statement |
| 3 | Objectives |
| 4 | Target Users |
| 5 | User Stories |
| 6 | Functional Requirements |
| 7 | Waste Categories |
| 8 | Admin Capabilities |
| 9 | PDF Report Generation |
| 10 | Non-Functional Requirements |
| 11 | MVP Features |
| 12 | Future Enhancements |
| 13 | Revenue Model |
| 14 | Technical Requirements |

---

## Repository

| Link | Description |
|------|-------------|
| [AhmedTyson/Team3-backend-GreenEco](https://github.com/AhmedTyson/Team3-backend-GreenEco) | Fork (my submission) |
| [shahdxz5/Team3-backend](https://github.com/shahdxz5/Team3-backend) | Original team repository |

---

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Language | PHP 8.2+ |
| Framework | Laravel 12 |
| Database | MySQL |
| Auth | JWT — `tymon/jwt-auth` |
| Authorization | Spatie Laravel Permission |
| PDF Generation | `barryvdh/laravel-dompdf` |
| Caching | Redis / File |
| Queue | Database / Redis |
| Deployment | Docker + Railway |
| Testing | PHPUnit — 94 tests, 224 assertions |

---

## Architecture

```
app/
├── Actions/              # Single-responsibility business logic
│   ├── BinRequest/       # Create, Cancel
│   └── Reward/           # Redeem
├── DTOs/                 # Typed Data Transfer Objects
├── Events/               # Domain events
│   ├── BinRequestDelivered
│   ├── DriverArriving
│   └── PickupRequestCompleted
├── Listeners/            # Event handlers (notifications, points)
├── Queries/              # Encapsulated query objects
│   ├── AnalyticsQuery
│   ├── BinRequestQuery
│   ├── ReportQuery
│   └── UserQuery
├── Observers/            # Cache invalidation
├── Models/               # Rich domain models
└── Http/
    ├── Controllers/      # Thin controllers
    ├── Requests/         # Form Request validation
    └── Resources/        # API response transformers
```

**Design Patterns used:** Action Pattern, Query Object, DTO, Observer, Event/Listener, Repository-lite.

---

## Modules

### User-Facing

| Module | Description |
|--------|-------------|
| Auth | Register, Login, Logout, JWT Refresh, Email Verification, Password Reset |
| Profile | View & update profile, upload photo |
| Addresses | CRUD — user delivery/pickup addresses |
| Pickup Requests | Schedule, track, and cancel recycling pickups |
| Bin Requests | Request a recycling bin delivery |
| Rewards | Browse catalog, redeem with points |
| Vouchers | View and use discount vouchers |
| Notifications | In-app notifications — list, mark read, unread count |

### Admin

| Module | Description |
|--------|-------------|
| Dashboard | Analytics — users, pickups, revenue, waste by category |
| User Management | List, view, ban/unban users |
| Pickup Management | Accept, assign driver, track status transitions |
| Bin Requests | Fulfil or reject bin requests |
| Driver Management | Add, update, assign to pickups |
| Waste Categories | CRUD for recyclable material categories & pricing |
| Rewards | Create and manage reward catalog |
| Vouchers | Issue and manage discount vouchers |
| Factory Management | Manage recycling factory partners |
| Reports | Generate & download PDF reports by date range |
| Notifications | Send broadcast notifications to users |

---

## API Endpoints

Full endpoint documentation: **[docs/GreenEco-API-Endpoints-Final.md](docs/GreenEco-API-Endpoints-Final.md)**

### Quick Reference

```
POST   /api/auth/register
POST   /api/auth/login
POST   /api/auth/logout
POST   /api/auth/refresh
GET    /api/auth/me

GET    /api/me
PUT    /api/me
POST   /api/me/photo

GET    /api/addresses
POST   /api/addresses
PUT    /api/addresses/{id}
DELETE /api/addresses/{id}

GET    /api/pickups
POST   /api/pickups
GET    /api/pickups/{id}
DELETE /api/pickups/{id}

GET    /api/bin-requests
POST   /api/bin-requests
DELETE /api/bin-requests/{id}

GET    /api/rewards
POST   /api/rewards/{id}/redeem

GET    /api/vouchers
GET    /api/notifications
GET    /api/notifications/unread-count
PATCH  /api/notifications/{id}/read
PATCH  /api/notifications/read-all

GET    /api/admin/dashboard
GET    /api/admin/users
GET    /api/admin/pickups
PATCH  /api/admin/pickups/{id}/status
GET    /api/admin/reports
POST   /api/admin/reports/generate
```

---

## Postman Collection

Import the collection to test all endpoints locally or against the deployed API.

**[→ Download Postman Collection](docs/GreenEco-Unified.postman_collection.json)**

### Collections Included

| Collection | Endpoints |
|-----------|-----------|
| Authentication | Register, Login, Logout, Refresh, Me, Verify Email, Reset Password |
| Profile | View, Update, Upload Photo |
| Addresses | List, Create, Update, Delete |
| Pickup Requests | User: List, Create, Show, Cancel / Admin: Accept, Assign, Status |
| Bin Requests | User: List, Create, Cancel / Admin: Fulfill, Reject |
| Rewards & Vouchers | Browse, Redeem, List Vouchers |
| Notifications | List, Unread Count, Mark Read, Mark All Read |
| Admin — Dashboard | Analytics |
| Admin — Users | List, Show, Ban |
| Admin — Drivers | CRUD, Assign |
| Admin — Waste Categories | CRUD |
| Admin — Factories | CRUD |
| Admin — Rewards | CRUD |
| Admin — Reports | Generate, Download, List |

### Environment Variables

```
base_url   = http://localhost:8000/api
token      = <auto-set after login>
id         = <resource ID for show/update/delete>
```

---

## Database

### Entity Relationship

See the ERD diagram: **[docs/GreenEco.drawio.png](docs/GreenEco.drawio.png)**

### Core Tables

| Table | Purpose |
|-------|---------|
| `users` | Registered users (admin / user / driver roles) |
| `addresses` | User pickup/delivery addresses |
| `pickup_requests` | Scheduled recycling pickups |
| `pickup_items` | Items per pickup (category + weight) |
| `bin_requests` | Recycling bin delivery requests |
| `waste_categories` | Recyclable material types (Paper, Plastic, Metal, Glass) |
| `drivers` | Driver profiles linked to users |
| `factories` | Recycling factory partners |
| `rewards` | Reward catalog |
| `vouchers` | Issued discount vouchers |
| `points_transactions` | Points earn/redeem ledger |
| `notifications` | In-app notification log |
| `reports` | Generated PDF report records |

### Waste Categories & Pricing

| Category | Points / kg |
|----------|------------|
| Paper | configurable |
| Plastic | configurable |
| Metal | configurable |
| Glass | configurable |

---

## Setup

### Prerequisites

- PHP 8.2+
- Composer 2.x
- MySQL 8+
- Redis (optional — for queue/cache)

### Installation

```bash
git clone https://github.com/AhmedTyson/Team3-backend-GreenEco.git
cd Team3-backend-GreenEco

composer install
cp .env.example .env
php artisan key:generate
php artisan jwt:secret

# Configure DB in .env then:
php artisan migrate --seed
php artisan storage:link
```

### Environment

```env
APP_URL=http://localhost:8000
DB_CONNECTION=mysql
DB_DATABASE=greeneco
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=<generated>
JWT_TTL=60

QUEUE_CONNECTION=database
# Start queue worker:
# php artisan queue:work --queue=high,default
```

### Docker (Railway)

```bash
docker build -t greeneco-backend .
docker run -p 8000:8000 greeneco-backend
```

---

## Testing

**94 tests — 224 assertions** — all passing.

```bash
# Run all tests
php vendor/bin/phpunit

# Run specific suite
php vendor/bin/phpunit tests/Feature/User/
php vendor/bin/phpunit tests/Feature/Admin/

# With coverage
php vendor/bin/phpunit --coverage-html coverage/
```

### Test Coverage

```
tests/
├── Feature/
│   ├── Admin/        # Dashboard, Users, Pickups, Reports, Drivers
│   ├── Auth/         # Register, Login, Logout, Refresh, Password Reset
│   ├── User/         # Pickups, Bin Requests, Rewards, Vouchers, Notifications
│   ├── Models/       # Unit-level model behavior
│   ├── Events/       # Domain event firing
│   └── Listeners/    # Points awarding, notification sending
└── Unit/             # Pure unit tests
```

---

> Contributed as a team member.

> **ThreeDOS:** [github.com/Threedos](https://github.com/Threedos)

---

*GreenEco — Making recycling rewarding.*
