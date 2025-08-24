# Getting Started

This guide will help you set up **LiteManage** locally on your machine so you can run and test the ERP system.

## Prerequisites
- PHP 8.2 or higher
- Composer
- Node.js & NPM
- MySQL or SQLite
- Git

## Installation

1. Clone the repository:
```bash
git clone https://github.com/YOUR-USERNAME/LiteManage.git
cd LiteManage
```
2. Install dependencies:
```bash
composer install
npm install
npm run dev
```
3. Copy .env and generate app key:
```bash
cp .env.example .env
php artisan key:generate
```
4. Configure your database in .env:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lite_manage_db
DB_USERNAME=root
DB_PASSWORD=yourpassword
```
5. Run migrations and seeders (if available):
```bash
php artisan migrate --seed
```
6. Serve the app locally:
```bash
php artisan serve
```
7. Visit http://127.0.0.1:8000 to view the project.

