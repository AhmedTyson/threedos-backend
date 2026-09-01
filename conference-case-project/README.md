<div align="center">
  <br />
  <img src="logo.png" width="160" alt="Itinera logo" />
  <br />

  # Itinera — Global Luxury Travel & Trip Planning Platform
  **Conference Case Study 1 — Team 2 Fullstack Application Monorepo**

  <br />

  [![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
  [![PHP](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net)
  [![JWT Auth](https://img.shields.io/badge/Auth-JWT-000000?style=for-the-badge&logo=json-web-tokens&logoColor=white)](https://jwt.io)
  [![GSAP](https://img.shields.io/badge/Animations-GSAP_3.12-88CE02?style=for-the-badge&logo=greensock&logoColor=white)](https://greensock.com)
  [![PayMob](https://img.shields.io/badge/Payments-PayMob-0052CC?style=for-the-badge)](https://paymob.com)
  [![Groq AI](https://img.shields.io/badge/AI-Groq_Llama3-F34B21?style=for-the-badge)](https://groq.com)
  ![Status](https://img.shields.io/badge/status-active-10b981?style=flat-square)
  ![Team](https://img.shields.io/badge/team-Team_2-8A2BE2?style=flat-square)

</div>

<br />

---

<br />

Welcome to the **Conference Case Study 1 (Team 2)** project repository! **Itinera** is an end-to-end luxury travel orchestration platform featuring curated itineraries, verified 5-star accommodations, real-time global weather radar, automated executive telemetry PDF reporting, AI-powered itinerary reviews, PayMob checkout, and an operator admin suite.

---

## <img src="https://api.iconify.design/lucide:folder-tree.svg?color=%238A2BE2" width="24" align="top" /> Structure

```text
Team2-Conference-Project/
├── fullstack/
│   ├── Backend/      # Laravel 12 RESTful API (PHP 8.2+, JWT, MySQL, Redis, PayMob, Groq AI)
│   └── Frontend/     # Vanilla JS Luxury Boarding-Pass Web App (HTML5, GSAP 3.12, Tailwind)
├── wiki/             # 📚 Project documentation home (all guides, references & audits)
└── README.md         # Master Repository Documentation
```

Each `fullstack/Backend` folder is self-contained Laravel API; `fullstack/Frontend` is vanilla JS app. The `wiki/` folder is the documentation home — former `docs/` merged here (see `wiki/Home.md` migration notes).

---

## <img src="https://api.iconify.design/lucide:sparkles.svg?color=%238A2BE2" width="24" align="top" /> Key Features & Highlights

| Area | Stack | Highlights |
|------|-------|------------|
| **Frontend** — Luxury Boarding-Pass Web App | Vanilla HTML5/CSS3/JS, GSAP 3.12, Tailwind | Onyx glassmorphism (`tokens.css`), GSAP staggered hero + 3D tilt + KPI roll-ups, carousel live weather (Open-Meteo, 17+ capitals °C/°F), 4K media (Maldives, Swiss Alps, Santorini, Paris, Tokyo, Cairo), `logo.png` branding, 10+ admin dashboards (Users/Trips/Reviews/Analytics) ~35 pages, 33 JS modules |
| **Backend** — Laravel 12 REST API | PHP 8.2+, JWT + Spatie RBAC, MySQL/Redis, DomPDF/OpenSpout | 120+ endpoints (213 `api/*` routes, 237 registrations, `/docs/api` OpenAPI), JWT Bearer refresh rotation (`super_admin`/`admin`/`user`), PayMob hosted checkout HMAC SHA-512, Groq LLM itinerary review, executive telemetry PDF + spreadsheet (`All Time` filter), seeders: 60+ paid orders/payments, 44 migrations, 34 seeders, 52 test classes |

---

## <img src="https://api.iconify.design/lucide:rocket.svg?color=%238A2BE2" width="24" align="top" /> Quick Start Guide

### 1. Backend Setup (`fullstack/Backend/`)

```bash
# 1. Navigate to backend directory
cd fullstack/Backend

# 2. Install PHP dependencies
composer install

# 3. Environment configuration
copy .env.example .env    # Windows (or cp .env.example .env on Linux/macOS)

# 4. Generate keys & linked storage
php artisan key:generate
php artisan jwt:secret --force
php artisan storage:link

# 5. Run database migrations & telemetry seeders
php artisan migrate:fresh --seed

# 6. Install frontend asset builder (Vite)
npm install
npm run build

# 7. Start backend development server
php artisan serve
```

- **Backend Base API URL:** `http://127.0.0.1:8000/api`
- **Live Interactive OpenAPI Docs:** `http://127.0.0.1:8000/docs/api`

### 2. Frontend Setup (`fullstack/Frontend/`)

```bash
cd fullstack/Frontend
python -m http.server 8080
# or
php -S 127.0.0.1:8080
```

- **Landing Page:** `http://localhost:8080/index.html`
- **Admin Suite:** `http://localhost:8080/admin/index.html`
- **Login Creds (Default Admin):** `admin@threedos.com` / `password`

---

## <img src="https://api.iconify.design/lucide:flask-conical.svg?color=%238A2BE2" width="24" align="top" /> Testing & Verification

```bash
cd fullstack/Backend
php artisan test --filter=ReportTest   # Report suite
php artisan test                        # All feature & unit tests (52 classes)
```

---

## <img src="https://api.iconify.design/lucide:book-open.svg?color=%238A2BE2" width="24" align="top" /> Documentation

All project documentation lives in the **[`wiki/`](wiki/Home.md)** folder:

| Section | Guides |
|---|---|
| **Start Here** | [System Overview](wiki/System%20Overview.md) · [Getting Started Guide](wiki/Getting%20Started%20Guide.md) · [Development Guidelines](wiki/Development%20Guidelines.md) |
| **Architecture** | [Architecture Overview](wiki/Architecture.md) · [Technology Stack & Architecture](wiki/Technology%20Stack%20%26%20Architecture.md) · [Backend Services](wiki/Backend%20Services.md) · [Frontend Application](wiki/Frontend%20Application.md) |
| **Operations** | [Infrastructure](wiki/Infrastructure.md) · [Deployment Guide](wiki/DEPLOYMENT.md) · [Environment Configuration](wiki/ENVIRONMENT.md) · [Release Sign-off](wiki/RELEASE_SIGN_OFF.md) |
| **API Reference** | [API Reference](wiki/API%20Reference.md) · [API Endpoints Reference](wiki/API%20Endpoints%20Reference.md) · [Routes Appendix](wiki/ROUTES-APPENDIX.md) · [Routes Registrations Appendix](wiki/ROUTES-REGISTRATIONS-APPENDIX.md) |
| **Audits** | [Frontend Audit Report](wiki/Frontend%20Audit%20Report.md) · [Fullstack Unification Audit](wiki/Fullstack%20Unification%20Audit.md) |

➡️ **Full index & migration notes:** [`wiki/Home.md`](wiki/Home.md)

---

## <img src="https://api.iconify.design/lucide:building-2.svg?color=%238A2BE2" width="24" align="top" /> About Conference

**Conference Case Study 1 — Team 2** is a student-run fullstack initiative replicating professional software company structure. Like **ThreeDOS**, members are assigned to functional departments (backend, frontend, product) and deliver under real constraints. **Itinera** was built as the luxury travel orchestration platform case study: Laravel 12 REST API (213 `api/*` routes, 120+ documented endpoints) + vanilla JS frontend (GSAP 3.12), deployed as two Railway services with Docker dual-role image. Goal: close gap between academic learning and industry readiness — same mission as ThreeDOS, scoped to conference deliverable.

---

## <img src="https://api.iconify.design/lucide:users.svg?color=%238A2BE2" width="24" align="top" /> Team

**Ahmed Elsayed** — Fullstack / Backend Delegate @ Conference Team 2 — [github.com/AhmedTyson](https://github.com/AhmedTyson)

Conference Team 2 — Fullstack Application Monorepo · [Team2-Conference-Project](https://github.com/AhmedTyson/Team2-Conference-Project)

---

## <img src="https://api.iconify.design/lucide:scale.svg?color=%238A2BE2" width="24" align="top" /> License

MIT — Internal Case Study Deliverable, Team 2.
