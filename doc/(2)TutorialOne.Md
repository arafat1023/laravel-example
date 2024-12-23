

## Overview
---

## Prerequisites

- **PHP**: Ensure PHP 8.0 or higher is installed.
- **Composer**: Laravel uses Composer for dependency management.
- **Node.js and npm**: Required for managing frontend assets.
- **Laravel Installer** (optional): You can use Composer to install Laravel directly.
- **Text Editor/IDE**: Use VSCode or any editor of your choice.

---

## Step-by-Step Guide

### 1. Installing Laravel

#### Using Composer (Recommended)
Run the following commands:

```bash
# Navigate to your working directory
cd ~/projects

# Create a new Laravel project
composer create-project laravel/laravel laravel_project

# Navigate to the project directory
cd laravel_project
```

#### Using Laravel Installer

```bash
# Install Laravel Installer globally
composer global require laravel/installer

# Create a new Laravel project
laravel new laravel_project

# Navigate to the project directory
cd laravel_project
```

---

### 2. Starting the Development Server

Run the built-in Laravel server:

```bash
php artisan serve
```

Access the application at `http://127.0.0.1:8000`.

---
