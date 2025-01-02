### Complete Setup Guide for Laravel (Windows, Linux, Mac)

This guide will help you set up Laravel on Windows, Linux, and macOS. Follow the instructions for your operating system to get Laravel up and running.

---

#### **Windows Setup**

1. **Install Prerequisites:**
    - **PHP**: Download and install PHP from [https://windows.php.net/](https://windows.php.net/).
    - **Composer**: Download and install Composer from [https://getcomposer.org/](https://getcomposer.org/).
    - **Node.js** (optional for frontend assets): Download from [https://nodejs.org/](https://nodejs.org/).

2. **Install Laragon:**
    - Download Laragon from [https://laragon.org/](https://laragon.org/).
    - Install and start Laragon.
    - Open the terminal in Laragon and run the following command to install Laravel:
      ```
      composer create-project --prefer-dist laravel/laravel project-name
      ```
    - Navigate to your project directory:
      ```
      cd project-name
      ```
    - Start the development server:
      ```
      php artisan serve
      ```
    - Open your browser and visit [http://localhost:8000](http://localhost:8000) to see the Laravel welcome page.

---

#### **Linux Setup**

1. **Update System Packages:**
   ```
   sudo apt update && sudo apt upgrade -y
   ```

2. **Install PHP and Dependencies:**
   ```
   sudo apt install php-cli php-mbstring php-xml php-bcmath php-curl unzip curl -y
   ```

3. **Install Composer:**
    - Download and install Composer globally:
      ```
      curl -sS https://getcomposer.org/installer | php
      sudo mv composer.phar /usr/local/bin/composer
      ```
    - Verify installation:
      ```
      composer --version
      ```

4. **Install Node.js and npm (optional):**
   ```
   sudo apt install nodejs npm -y
   ```

5. **Install Laravel:**
    - Create a new Laravel project:
      ```
      composer create-project --prefer-dist laravel/laravel project-name
      ```
    - Navigate to the project directory:
      ```
      cd project-name
      ```
    - Start the development server:
      ```
      php artisan serve
      ```
    - Open your browser and visit [http://localhost:8000](http://localhost:8000).

---

#### **Mac Setup**

1. **Install Homebrew (if not already installed):**
   ```
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```

2. **Install PHP and Dependencies:**
   ```
   brew install php
   ```

3. **Install Composer:**
    - Download and install Composer:
      ```
      curl -sS https://getcomposer.org/installer | php
      sudo mv composer.phar /usr/local/bin/composer
      ```
    - Verify installation:
      ```
      composer --version
      ```

4. **Install Node.js and npm (optional):**
   ```
   brew install node
   ```

5. **Install Laravel:**
    - Create a new Laravel project:
      ```
      composer create-project --prefer-dist laravel/laravel project-name
      ```
    - Navigate to the project directory:
      ```
      cd project-name
      ```
    - Start the development server:
      ```
      php artisan serve
      ```
    - Open your browser and visit [http://localhost:8000](http://localhost:8000).

---

#### **Common Post-Setup Steps**

1. **Set File Permissions (Linux and Mac):**
   ```
   sudo chmod -R 775 storage bootstrap/cache
   ```

2. **Environment File Configuration:**
    - Copy the `.env.example` file to `.env`:
      ```
      cp .env.example .env
      ```
    - Generate the application key:
      ```
      php artisan key:generate
      ```

3. **Database Setup:**
    - Update the `.env` file with your database credentials.
    - Run migrations to create the database tables:
      ```
      php artisan migrate
      ```

4. **Install Frontend Dependencies (Optional):**
    - Install dependencies using npm:
      ```
      npm install
      ```
    - Build frontend assets:
      ```
      npm run dev
      ```

---

#### **Verification**
To verify that your Laravel application is fully set up:
1. Access the default Laravel welcome page at [http://localhost:8000](http://localhost:8000).
2. Test creating a sample route in the `routes/web.php` file:
   ```php
   Route::get('/hello', function () {
       return "Hello, Laravel!";
   });
   ```
3. Visit [http://localhost:8000/hello](http://localhost:8000/hello) in your browser.

---

With this guide, you should have Laravel running smoothly on any of the major operating systems. Let me know if you encounter any issues or have further questions!

