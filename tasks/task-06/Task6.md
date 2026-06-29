# <img src="https://api.iconify.design/lucide:clipboard-list.svg?color=%238A2BE2" width="32" align="top" /> Task 06: Doctorna REST API

## <img src="https://api.iconify.design/lucide:book-open.svg?color=%238A2BE2" width="24" align="top" /> Brief

Build a team project of your own idea that satisfies the given requirements. The team chose to build **Doctorna** — a clinic management and medical appointment booking REST API built entirely in Vanilla PHP — no frameworks, no Laravel, no Symfony.

---

## <img src="https://api.iconify.design/lucide:list-checks.svg?color=%238A2BE2" width="24" align="top" /> Project Requirements

### 1. General Rules

- Common E-Commerce and To-Do List projects are **not allowed**.
- The system must contain **two roles**:
  - **Admin Role** — has all rights.
  - **User Role**
- The project must include **at least 4 modules** (the Authentication module is not counted).

### 2. Authentication

Implement a common authentication system for both Admin and User. The authentication module must include:

- Login
- Sign Up
- Forgot Password
- Reset Password

### 3. System Features

The project must include the following features:

- **Filtration** for data listing.
- **Soft Delete** instead of permanent deletion.
- **Performance Enhancements**, such as:
  - Pagination
  - Caching

---

## <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%238A2BE2" width="24" align="top" /> Deliverable

This task was completed by building the Doctorna project as a team — a real-world, production-grade PHP REST API that satisfies all the above requirements.

**Status:** Completed <img src="https://api.iconify.design/lucide:check-circle-2.svg?color=%2310b981" width="18" align="text-bottom" />

---

## <img src="https://api.iconify.design/lucide:layers.svg?color=%238A2BE2" width="24" align="top" /> Tech Stack

| Layer | Technology |
| ----- | ---------- |
| Language | Vanilla PHP (no framework) |
| Database | MySQL via PDO |
| Caching | Redis (`predis/predis`) |
| Authentication | JWT (`firebase/php-jwt`) |
| Architecture | Router → Controller → Repository |

---

## <img src="https://api.iconify.design/lucide:folder-tree.svg?color=%238A2BE2" width="24" align="top" /> Project Structure

```
/
├── config/         # Environment loading and database connection
├── Controllers/    # Request parsing, validation, and business logic
├── helper/         # Global utilities (Response formatting, caching, filtration)
├── repos/          # Data Access Layer (SQL queries and PDO)
├── routes/         # API Gateway (api.php)
├── .env.example    # Environment variable template
└── composer.json   # Autoloading and dependency mapping
```

---

## <img src="https://api.iconify.design/lucide:link.svg?color=%238A2BE2" width="24" align="top" /> Repository

> **Original Repository (by Rawan Ahmed):**
> <img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[RawanAhmed00/doctorna](https://github.com/RawanAhmed00/doctorna)**

> **Forked Repository:**
> <img src="https://api.iconify.design/lucide:corner-down-right.svg?color=%238A2BE2" width="18" align="text-bottom" /> **[AhmedTyson/doctorna](https://github.com/AhmedTyson/doctorna)**
