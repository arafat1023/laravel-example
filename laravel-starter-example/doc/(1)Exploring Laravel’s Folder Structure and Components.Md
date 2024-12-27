**Laravel Class 1: Exploring Laravel’s Folder Structure and Components**
---

### **1. Understanding Laravel’s Folder Structure**
Laravel’s folder structure is designed to separate concerns and streamline the development process. Below is an overview of key folders and their purposes:

#### **Key Folders**
- **app/**: Contains the core code of your application (models, controllers, middleware).
- **bootstrap/**: Manages the framework bootstrapping process.
- **config/**: Stores configuration files for the application.
- **database/**: Contains migrations, seeds, and factories.
- **public/**: Serves as the entry point for HTTP requests (e.g., `index.php`).
- **resources/**: Contains views, raw assets (CSS, JS), and language files.
- **routes/**: Defines all routes for the application (web, API, console, etc.).
- **storage/**: Handles logs, cached data, and uploaded files.
- **tests/**: Contains automated tests.
- **vendor/**: Stores third-party libraries and dependencies.

#### **Hands-On Activity**
1. Install a fresh Laravel application using Composer:
   ```bash
   composer create-project laravel/laravel laravel-project
   ```
2. Open the project in your code editor (e.g., VSCode) and explore the folder structure.

---

### **2. Understanding HTTP Request Flow in Laravel**
Laravel follows a structured flow to handle HTTP requests:
1. **Public/index.php**: The entry point for all HTTP requests.
2. **HTTP Kernel**: Routes the request to appropriate middleware.
3. **Route Service Provider**: Matches the request to a route.
4. **Controller**: Executes the business logic.
5. **View**: Returns a response to the browser.

---

### **3. Using Artisan Commands for Automation**
Artisan is Laravel’s command-line interface that simplifies tasks like database migrations, scaffolding, and more.

#### **Common Commands**
- `php artisan list`: Lists all available commands.
- `php artisan serve`: Starts a local development server.
- `php artisan make:controller`: Creates a new controller.

#### **Hands-On Activity**
- Start the server and view the application:
  ```bash
  php artisan serve
  ```
- Generate a new controller:
  ```bash
  php artisan make:controller HomeController
  ```

---

### **4. Introduction to Packagist and Laravel Packages**
Packagist is the default package manager for PHP, and Laravel leverages it for third-party packages.

#### **Using Packagist**
1. Visit [Packagist](https://packagist.org/) to explore available packages.
2. Install a popular package (e.g., Laravel Debugbar):
   ```bash
   composer require barryvdh/laravel-debugbar
   ```
3. Use the package in your application (e.g., Debugbar for performance insights).

---

### **5. Request Lifecycle in Laravel**
Laravel’s request lifecycle consists of the following steps:
1. **Receiving the Request**: The HTTP kernel receives the request.
2. **Middleware**: Executes pre-routing tasks.
3. **Routing**: Matches the request to a route.
4. **Controller**: Executes business logic.
5. **Response**: Returns a response to the client.

#### **References**
- Laravel Official Documentation: [Request Lifecycle](https://laravel.com/docs/10.x/lifecycle)
- Tutorial: [Understanding Laravel’s Lifecycle](https://laravel-news.com/understanding-laravel-lifecycle)

---

### **6. Class Project: Setting Up the Base Project**
#### **Objective**
Set up a base Laravel project that will evolve into a production-level application.

#### **Steps**
1. Create a new Laravel project:
   ```bash
   composer create-project laravel/laravel projectname
   ```
2. Start the development server:
   ```bash
   php artisan serve
   ```
3. Create a new route in `routes/web.php`:
   ```php
   Route::get('/', function () {
       return view('welcome');
   });
   ```
4. Open the project in your browser at `http://localhost:8000`.

---

### **Assignment**
1. Create a new route and return a simple message.
   Example:
   ```php
   Route::get('/hello', function () {
       return 'Hello, Laravel!';
   });
   ```
2. Explore and document the purpose of each folder in the Laravel structure.

---

### **References for Further Reading**
1. Laravel Official Documentation: [Getting Started](https://laravel.com/docs/10.x)
2. Video: [Laravel for Beginners](https://www.youtube.com/playlist?list=PLpzy7FIRqpGD0kxI48v8QEVVZd744Phi4)

