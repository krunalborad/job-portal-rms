# Setup Guide

## Quick Start

### Prerequisites
- Node.js 18+
- PHP 8.2+
- Composer
- Docker
- MySQL 8.0+

### Option 1: Docker Setup

```bash
git clone https://github.com/krunalborad/job-portal-rms.git
cd job-portal-rms
docker-compose up -d
docker-compose exec app php artisan migrate
```

Access:
- Frontend: http://localhost:5173
- Backend: http://localhost:8000

### Option 2: Local Setup

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

cd ../frontend
npm install
npm run dev
```

## Database Setup

```sql
CREATE DATABASE job_portal;
```

## Troubleshooting

- Port already in use: Change ports in docker-compose.yml
- Permission denied: Run `chmod -R 775 backend/storage`
- DB connection error: Verify MySQL is running