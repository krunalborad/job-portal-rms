# Job Portal & Recruitment Management System (RMS)

A modern, full-stack application combining LinkedIn Jobs + Indeed + Recruiter Dashboard capabilities.

## 🎯 Overview

**Job Portal & RMS** is a comprehensive recruitment platform built with cutting-edge technologies, designed to streamline job searching, posting, and talent management.

### Tech Stack
- **Frontend**: React 18+ with TypeScript, Vite, Tailwind CSS, Redux Toolkit
- **Backend**: Laravel 11 with PHP 8.2+, RESTful API, JWT Authentication
- **Database**: MySQL 8.0+
- **DevOps**: Docker, Docker Compose, GitHub Actions

---

## ✨ Key Features

### 👤 For Job Seekers
- ✅ User registration & authentication
- ✅ Advanced job search & filtering
- ✅ Job application management
- ✅ Resume/CV upload & management
- ✅ Saved jobs & job alerts
- ✅ Application status tracking

### 🏢 For Recruiters
- ✅ Company profile management
- ✅ Job posting creation & management
- ✅ Application tracking system (ATS)
- ✅ Candidate screening & filtering
- ✅ Interview scheduling & feedback
- ✅ Analytics & reporting dashboard

### 🔐 For Admins
- ✅ User & company management
- ✅ Platform analytics & insights
- ✅ Moderation & content management

---

## 🚀 Quick Start

### Prerequisites
- Node.js 18+
- PHP 8.2+
- Composer
- Docker & Docker Compose
- MySQL 8.0+

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/krunalborad/job-portal-rms.git
   cd job-portal-rms
   ```

2. **Setup using Docker**
   ```bash
   docker-compose up -d
   ```

3. **Setup Backend (Laravel)**
   ```bash
   cd backend
   composer install
   cp .env.example .env
   php artisan key:generate
   php artisan migrate
   php artisan db:seed
   ```

4. **Setup Frontend (React)**
   ```bash
   cd ../frontend
   npm install
   npm run dev
   ```

5. **Access the application**
   - Frontend: `http://localhost:5173`
   - Backend API: `http://localhost:8000/api`

---

## 📚 Documentation

See [docs/SETUP.md](./docs/SETUP.md) for complete setup guide.

---

## 🛠 Development

### Frontend Development
```bash
cd frontend
npm run dev          # Development server
npm run build        # Production build
npm run lint         # ESLint
```

### Backend Development
```bash
cd backend
php artisan serve    # Development server
```

---

## 🐳 Docker Deployment

```bash
# Build and start containers
docker-compose up -d

# Run migrations
docker-compose exec app php artisan migrate

# Run seeders
docker-compose exec app php artisan db:seed
```

---

## 🔐 Security

- JWT token authentication
- Password hashing (Bcrypt)
- CORS configuration
- Input validation & sanitization
- SQL injection prevention (Eloquent ORM)
- Rate limiting

---

## 📄 License

MIT License - see LICENSE file for details.

---

**Built with ❤️ for the modern recruitment industry**