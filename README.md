# LiteManage

[![Laravel](https://img.shields.io/badge/Laravel-11-orange)](https://laravel.com/)
[![PHP](https://img.shields.io/badge/PHP-8.2-blue)](https://www.php.net/)
[![License](https://img.shields.io/badge/License-MIT-green)](LICENSE)

---

## Overview

**LiteManage** is a lightweight **Inventory and Sales Management System** built using **Laravel 11**, designed for small stores or kiosks handling **non-perishable food items** such as canned goods, bottled drinks, and dry groceries.

It provides essential tools for:
- Product management
- Customer tracking
- Sales recording
- Stock monitoring

---

## Features

- **Product Management**: Add, edit, delete, and categorize products.
- **Customer Management**: Track customer info and purchase history.
- **Sales Recording**: Create sales with multiple products and quantities.
- **Stock Updates**: Auto-update inventory after each sale.
- **Revenue Tracking**: Subtotals, totals, and historical pricing for accurate reporting.

---

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


## Documentation

- [Getting Started](LiteManageDocs/getting-started.md)
- [Product Management](LiteManageDocs/product-management.md)
- [Handling Sales](LiteManageDocs/handling-sales.md)
- [Customer Profiles](LiteManageDocs/customer-profiles.md)
- [Database Structure](LiteManageDocs/database-structure.md)
