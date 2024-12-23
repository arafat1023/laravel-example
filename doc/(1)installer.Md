# Installation Guide for Laravel and Dependencies (Beginner-Friendly)
---

## Step 1: Installing PHP

### On Windows:
1. Download PHP from the [official PHP website](https://windows.php.net/download/).
2. Choose the `Non-thread safe` zip file for your system architecture (64-bit or 32-bit).
3. Extract the downloaded file to a directory (e.g., `C:\php`).
4. Add PHP to the system PATH:
    - Search for "Environment Variables" in the Windows Start Menu.
    - Under "System Variables," find and edit the `Path` variable.
    - Add the path to your PHP directory (e.g., `C:\php`).
5. Verify the installation:
   ```bash
   php -v
   ```

### On macOS:
1. Install Homebrew if not already installed:
   ```bash
   /bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
   ```
2. Install PHP using Homebrew:
   ```bash
   brew install php
   ```
3. Verify the installation:
   ```bash
   php -v
   ```

### On Linux:
1. Update your package list:
   ```bash
   sudo apt update
   ```
2. Install PHP:
   ```bash
   sudo apt install php-cli php-mbstring unzip curl
   ```
3. Verify the installation:
   ```bash
   php -v
   ```

---

## Step 2: Installing Composer

Composer is required for managing Laravel dependencies.

### On Windows:
1. Download the Composer setup file from [getcomposer.org](https://getcomposer.org/).
2. Run the installer and follow the steps.
3. Verify the installation:
   ```bash
   composer -V
   ```

### On macOS:
1. Use Homebrew:
   ```bash
   brew install composer
   ```
2. Verify the installation:
   ```bash
   composer -V
   ```

### On Linux:
1. Download and install Composer globally:
   ```bash
   curl -sS https://getcomposer.org/installer | php
   sudo mv composer.phar /usr/local/bin/composer
   ```
2. Verify the installation:
   ```bash
   composer -V
   ```

---

## Step 3: Installing Node.js and npm
Node.js and npm are required for managing frontend dependencies in Laravel.

### On Windows:
1. Download and install Node.js from [nodejs.org](https://nodejs.org/).
2. Verify the installation:
   ```bash
   node -v
   npm -v
   ```

### On macOS:
1. Install Node.js using Homebrew:
   ```bash
   brew install node
   ```
2. Verify the installation:
   ```bash
   node -v
   npm -v
   ```

### On Linux:
1. Add the Node.js PPA:
   ```bash
   curl -fsSL https://deb.nodesource.com/setup_16.x | sudo -E bash -
   ```
2. Install Node.js:
   ```bash
   sudo apt install -y nodejs
   ```
3. Verify the installation:
   ```bash
   node -v
   npm -v
   ```

---

## Step 4: Installing a Database (MySQL)
Laravel requires a database for dynamic applications. MySQL is commonly used.

### On Windows:
1. Download MySQL from the [official website](https://dev.mysql.com/downloads/installer/).
2. Run the installer and select the "Developer Default" option.
3. During setup, configure the root password and remember it.
4. Verify the installation:
    - Open the MySQL Command Line Client and log in:
      ```bash
      mysql -u root -p
      ```

### On macOS:
1. Install MySQL using Homebrew:
   ```bash
   brew install mysql
   ```
2. Start MySQL:
   ```bash
   brew services start mysql
   ```
3. Secure the installation:
   ```bash
   mysql_secure_installation
   ```
4. Verify the installation:
   ```bash
   mysql -u root -p
   ```

### On Linux:
1. Install MySQL:
   ```bash
   sudo apt update
   sudo apt install mysql-server
   ```
2. Secure the installation:
   ```bash
   sudo mysql_secure_installation
   ```
3. Verify the installation:
   ```bash
   mysql -u root -p
   ```

---

## Step 5: Installing Laravel

Laravel can be installed using Composer.

### Option 1: Directly via Composer
1. Create a new Laravel project:
   ```bash
   composer create-project laravel/laravel laravel_project
   ```
2. Navigate into the project directory:
   ```bash
   cd laravel_project
   ```

### Option 2: Using the Laravel Installer
1. Install the Laravel Installer globally:
   ```bash
   composer global require laravel/installer
   ```
2. Create a new Laravel project:
   ```bash
   laravel new laravel_project
   ```
3. Navigate into the project directory:
   ```bash
   cd laravel_project
   ```

---

## Step 6: Starting the Laravel Development Server

Run the following command to start the built-in development server:
```bash
php artisan serve
```
Open your browser and visit `http://127.0.0.1:8000` to see the Laravel welcome page.

---

## Troubleshooting Common Issues

1. **PHP Not Found:**
    - Ensure PHP is added to your system’s PATH.

2. **Composer Not Found:**
    - Verify that Composer’s installation path is in your PATH environment variable.

3. **Node.js or npm Not Found:**
    - Reinstall Node.js and ensure the installation directory is in your PATH.

4. **Permission Issues on Linux:**
    - Use `sudo` for commands requiring elevated privileges.

---

## References
1. [Laravel Official Documentation](https://laravel.com/docs/)
2. [Composer Official Website](https://getcomposer.org/)
3. [Node.js Official Website](https://nodejs.org/)
4. [MySQL Documentation](https://dev.mysql.com/doc/)

