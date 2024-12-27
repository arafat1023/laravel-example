# Code Quality and Linting in Laravel Projects
---

## **1. Coding Standards**

This project follows the following coding standards:

- **PSR-12:** The official PHP coding standard, providing a base set of rules for code formatting. [PSR-12 Documentation](https://www.php-fig.org/psr/psr-12/)
- **Laravel Coding Style:** Extends PSR-12 with conventions specific to Laravel development. [Laravel Contributing Guide](https://laravel.com/docs/contributions) (See Code Style section)

**Key Aspects:**

- **Indentation:** 4 spaces (no tabs).
- **Line length:** Maximum 120 characters.
- **Class and method naming:** Descriptive and consistent.
- **Docblocks:** Used for documenting classes, methods, and properties.
- **Array Syntax:** Always use short array syntax (`[]`).
- **Order of Methods:** Group methods logically (e.g., public before protected/private).

---

## **2. Linting and Static Analysis Tools**

The following tools are used to automate code quality checks:

### **PHPStan**
A static analysis tool that detects errors without executing the code. It helps identify type errors, undefined variables, and other potential issues.

- Install via Composer:
  ```bash
  composer require --dev phpstan/phpstan
  ```
- Run analysis:
  ```bash
  vendor/bin/phpstan analyse
  ```

### **Laravel Pint**
An opinionated PHP code style fixer for minimalists. It automatically fixes code style issues based on PSR-12 and Laravel conventions.

- Install via Composer:
  ```bash
  composer require --dev laravel/pint
  ```
- Run Pint:
  ```bash
  ./vendor/bin/pint
  ```

### **PHP-CS-Fixer**
A more configurable code style fixer that can be used if more customization is needed beyond Pint's defaults.

- Install globally:
  ```bash
  composer global require friendsofphp/php-cs-fixer
  ```
- Basic usage:
  ```bash
  php-cs-fixer fix .
  ```

---

## **3. Including Linting Tools in Your Project**

### **Adding Tools to Composer Scripts**
Include linting commands in the `scripts` section of your `composer.json` file for easy access:

```json
"scripts": {
    "lint": [
        "phpstan analyse",
        "./vendor/bin/pint"
    ],
    "lint:fix": "./vendor/bin/pint"
}
```

Run these scripts using:

```bash
composer lint
composer lint:fix
```

### **Configuration Files**

1. **PHPStan Configuration**: Create a `phpstan.neon` file:
   ```neon
   includes:
       - vendor/phpstan/phpstan/conf/bleedingEdge.neon

   parameters:
       level: max
       paths:
           - app
           - routes
       excludePaths:
           - storage/framework/cache/*
   ```

2. **Laravel Pint Configuration**: Create a `pint.json` file:
   ```json
   {
       "preset": "laravel",
       "rules": {
           "binary_operator_spaces": {
               "default": "align_single_space"
           }
       }
   }
   ```

3. **Git Pre-Commit Hook**: Automate linting before commits using Husky.
    - Install Husky:
      ```bash
      composer require --dev husky/husky
      ```
    - Add a pre-commit hook in `.husky/pre-commit`:
      ```bash
      #!/bin/sh
      composer lint
      ```

---

## **4. Setting Up Linting in IDEs**

### **VS Code**

1. Install Extensions:
    - **PHP Intelephense**
    - **Laravel Snippets**
    - **PHP CS Fixer**

2. Configure Settings:
   Open settings (`Ctrl + ,` or `Cmd + ,`) and add:
   ```json
   "editor.formatOnSave": true,
   "phpcsfixer.executablePath": "~/.composer/vendor/bin/php-cs-fixer",
   "phpcsfixer.rules": {
       "@PSR12": true
   }
   ```

3. Add a `tasks.json` file:
   ```json
   {
       "version": "2.0.0",
       "tasks": [
           {
               "label": "Lint PHP",
               "type": "shell",
               "command": "composer lint",
               "group": {
                   "kind": "build",
                   "isDefault": true
               }
           }
       ]
   }
   ```

### **WebStorm**

1. Enable PHP Support:
    - Go to `File > Settings > Plugins`.
    - Install the PHP plugin.

2. Set Up PHP Interpreter:
    - Go to `File > Settings > PHP`.
    - Add a local PHP interpreter.

3. Integrate PHP-CS-Fixer:
    - Go to `File > Settings > Tools > External Tools`.
    - Add a new tool with these settings:
        - **Name**: PHP-CS-Fixer
        - **Program**: Path to `php-cs-fixer`
        - **Arguments**: `fix $FilePath$`
        - **Working Directory**: `$ProjectFileDir$`

4. Set Up File Watchers:
    - Go to `File > Settings > File Watchers`.
    - Add a watcher for PHP-CS-Fixer.

---

## **References for Further Reading**

1. [PHPStan Documentation](https://phpstan.org/)
2. [Laravel Pint Documentation](https://laravel.com/docs/11.x/pint)
3. [PHP-CS-Fixer Documentation](https://cs.symfony.com/)
4. [VS Code PHP Setup Guide](https://code.visualstudio.com/docs/languages/php)
5. [WebStorm PHP Tools](https://www.jetbrains.com/webstorm/features/php.html)

---
