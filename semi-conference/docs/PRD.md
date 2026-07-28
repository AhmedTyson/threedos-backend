# Product Requirements Document (PRD)

# GreenEco

**Version:** 1.0
**Prepared By:** AC Heads
**Project Type:** Website + Admin Dashboard
**Industry:** Sustainability / Recycling / Logistics

---

## 1. Product Overview

### Product Name
GreenEco

### Vision
To make recycling simple, rewarding, and accessible by connecting households, educational institutions, and businesses with recycling factories through an intelligent waste collection service.

### Problem Statement
Every day, large amounts of recyclable waste (paper, plastic, and metal) are discarded without proper sorting or recycling. Individuals and organizations lack an easy and organized method to dispose of recyclable materials, while recycling factories struggle to receive a consistent supply of sorted waste.

GreenEco bridges this gap by providing a website that enables users to request recycling bins, schedule waste collection, and receive rewards, while delivering recyclable materials directly to recycling factories.

---

## 2. Project Objectives

### Business Objectives
- Increase recycling rates in Egypt.
- Build partnerships with recycling factories.
- Generate revenue by selling recyclable materials.
- Encourage sustainable behavior through a rewards system.
- Build a scalable digital recycling ecosystem.

### User Objectives
- Make recycling easy and convenient.
- Schedule waste collection online.
- Earn rewards for contributing to environmental sustainability.

---

## 3. Target Users

### Primary Users
- Individuals
- Families
- Schools
- Universities
- Companies
- Offices

### Secondary Users
- Recycling factories
- Environmental organizations

---

## 4. Value Proposition

### For Users
- Free and convenient recycling service.
- Door-to-door waste collection.
- Rewards through vouchers and promo codes.
- Simple online scheduling.

### For Recycling Factories
- Reliable source of sorted recyclable materials.

### For Society
- Reduced pollution.
- Higher recycling rates.
- Better environmental awareness.

---

## 5. User Journey

1. User creates an account.
2. User requests recycling bins.
3. GreenEco delivers three recycling bins:
   - Paper
   - Plastic
   - Metal
4. User separates recyclable waste.
5. Once bins are full, the user schedules a pickup.
6. A driver collects the waste.
7. Waste is delivered to a recycling factory.
8. User receives reward points and vouchers.

---

## 6. User Roles

### User
A registered user can:
- Register an account
- Login
- Verify email
- Reset forgotten password
- Manage profile
- Manage addresses
- Create pickup requests
- View pickup history
- View pickup details
- Cancel pending pickup requests

### Admin
An administrator can:
- Manage users
- Manage waste categories
- Manage recycling plants
- View all pickup requests
- Accept or reject requests
- Assign recycling plants
- Update request statuses
- View dashboard statistics

---

## 7. Functional Requirements

### Authentication
- User Registration
- Login
- Password Recovery
- Email Verification

### User Profile
- Edit personal information
- Manage addresses
- View recycling history

### Bin Request
Users can request recycling bins for:
- Paper
- Plastic
- Metal

The system should:
- Verify service availability.
- Assign delivery.
- Track request status.

### Pickup Scheduling
Users can:
- Select pickup address.
- Choose pickup date.
- Choose available time slot.

The system automatically assigns the nearest available driver.

### Pickup Tracking
Pickup statuses include:
- Pending
- Assigned
- On the Way
- Picked Up
- Delivered
- Completed

### Rewards System
After every successful pickup, users receive:
- Reward Points
- Promo Codes
- Discount Vouchers

Rewards may depend on:
- Number of pickups.
- Weight of collected waste.
- Promotional campaigns.

### Notifications
Users receive Email notifications for:
- Bin delivery
- Pickup reminders
- Driver arrival
- Pickup completion
- Reward confirmation
- Promotions

---

## 8. Admin Dashboard (Website)

The Admin Dashboard will be developed as a web application. It should enable administrators to monitor operations, manage users, and generate reports efficiently.

### User Management
The administrator can:
- View all users.
- Search users.
- Edit user information.
- Suspend or activate accounts.
- View recycling history.

### Driver Management
The administrator can:
- Add drivers.
- Edit driver information.
- Assign pickup requests.
- Monitor driver availability.
- View completed pickups.

### Pickup Management
The administrator can:
- View all pickup requests.
- Assign pickups.
- Update pickup statuses.
- Monitor pending and completed collections.

### Recycling Factory Management
The administrator can:
- Manage recycling factory information.
- View delivery history.
- Monitor delivered recyclable materials.

### Analytics Dashboard
The dashboard should display:
- Total registered users.
- Total pickup requests.
- Completed pickups.
- Pending pickups.
- Total paper collected.
- Total plastic collected.
- Total metal collected.
- Revenue generated.
- Active drivers.
- Partner recycling factories.

---

## 9. PDF Report Generation

One of the required deliverables from the Back-End Team is implementing a PDF Report Generation feature within the Admin Dashboard.

The administrator should be able to generate downloadable PDF reports based on a selected date range. The reports should be generated dynamically using Laravel PDF libraries.

### Reports
Each report should contain:
- GreenEco logo.
- Report title.
- Date of generation.
- Selected reporting period.
- Summary statistics.
- Detailed tables.
- Charts (optional bonus).
- Total collected paper.
- Total collected plastic.
- Total collected metal.
- Total revenue.
- Page numbering.

The administrator should also be able to:
- Download reports as PDF.
- Print reports.
- View previously generated reports.

---

## 10. Non-Functional Requirements

### Performance
- Page loading time below 2 seconds.
- Support at least 10,000 concurrent users.

### Security
- Encrypted passwords.
- Secure authentication.
- Role-based authorization.
- Protected APIs.

### Usability
- Responsive website.
- Arabic and English language support.
- Easy navigation.

### Availability
- 99.9% uptime.

### Scalability
The system should support:
- Additional cities.
- New waste categories.
- More recycling partners.

---

## 11. MVP Features

The Minimum Viable Product (MVP) includes:
- User Registration/Login
- Request Recycling Bins
- Pickup Scheduling
- Pickup Tracking
- Rewards System
- Voucher Management
- Notifications
- Admin Dashboard
- Driver Management
- PDF Report Generation

---

## 12. Future Enhancements

- AI waste classification using image recognition.
- QR codes on recycling bins.
- Smart IoT recycling bins.
- Carbon footprint calculator.
- Community recycling competitions.
- School sustainability challenges.
- Corporate sustainability dashboard.
- Gamification (badges, achievements, leaderboards).
- Referral system.
- Marketplace for recycled products.

---

## 13. Revenue Model

### Primary Revenue
- Selling recyclable materials to recycling factories.

### Secondary Revenue
- Sponsored campaigns.
- Corporate sustainability subscriptions.

---

## 14. Technical Requirements

### Front-End Team Responsibilities
The Front-End Team is responsible for developing:
- Responsive website interfaces.
- User authentication pages.
- User dashboard.
- Pickup scheduling pages.
- Rewards and voucher pages.
- Admin dashboard interface.
- Analytics and charts.
- Report generation interface.
- Factory management pages.
- Driver management pages.

### Back-End Team Responsibilities
The Back-End Team is responsible for developing:
- RESTful APIs.
- Database architecture.
- Authentication and authorization.
- User management.
- Notification services.
- Analytics calculations.
- PDF report generation using Laravel.
- Admin dashboard functionality.
- Secure API integration.
