# Installation

1. [PHP](https://www.php.net/)
2. [Composer](https://getcomposer.org/)
3. [Laravel](https://laravel.com/)
4. [npm](https://www.npmjs.com/)
5. [MySQL](https://dev.mysql.com/)


## NOTE:
PHP, Composer, Laravel can be installed for this [guideline](https://laravel.com/docs/11.x)

## PHP
Installation Guideline: https://www.php.net/manual/en/index.php

## Composer
Installation Guideline: https://getcomposer.org/doc/00-intro.md

## Laravel
`composer` is a dependency management tool for php. It auto manages dependencies of your project according to your requirements and thus makes your project more distributable.

If you already have PHP and Composer installed, you may install the Laravel installer via Composer:

```bash
composer global require laravel/installer
```

## Npm
`npm` is a package manager for [Node.js](https://nodejs.org/en). PHP often uses javascript for client side files. [Vite](https://v2.vitejs.dev/) is one of the popular frontend tool for bundling javascript. It is included in starter kit of laravel.

To install `npm` & `node`, it is better to use [nvm](https://github.com/nvm-sh/nvm?tab=readme-ov-file). `Node Version Manager` helps switching between different `nodejs` versions.

## Install MySQL
Installation Guideline: https://dev.mysql.com/doc/refman/8.4/en/installing.html
After setting up mysql database, you will need to give a root password. Please keep that password secure. later you can use that password to access database as root user by following command
```bash
mysql -u root -p
```


## Prerequisite
1. Git
2. IDE (VS Code, Php Storm)
3. Communication channel (Ex: Slack, email etc.)
4. PHP Basic
5. HTML Basic
6. Javascript Basic
7. SQL Database


## REFERENCES
1. https://www.tutorialspoint.com/php/php_quick_guide.htm
2. https://www.javatpoint.com/how-to-install-laravel-on-mac
3. https://www.luckymedia.dev/blog/laravel-for-beginners-installing-on-macos-and-windows
4. https://medium.com/nerd-for-tech/how-to-create-first-laravel-project-using-composer-c753d1096e32
5. https://nodejs.org/en
6. https://v2.vitejs.dev/
7. https://github.com/nvm-sh/nvm
8. https://github.com/coreybutler/nvm-windows
9. https://www.freecodecamp.org/news/node-version-manager-nvm-install-guide/
10. https://medium.com/@imvinojanv/how-to-install-node-js-and-npm-using-node-version-manager-nvm-143165b16ce1
11. https://dev.mysql.com/
12. https://dev.mysql.com/doc/refman/8.4/en/installing.html
