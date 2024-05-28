# This Is My First Phalcon Project
This project contains basic crud logic

Assume there is users table in mysql db its structure as follows:
```
CREATE TABLE `users`
(
    `id`    int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Record ID',
    `name`  varchar(255) NOT NULL COMMENT 'User Name',
    `email` varchar(255) NOT NULL COMMENT 'User Email Address',
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
```

We made the basic Create, Read, Update, and Delete operations on this table.

Here is the project structure:
```
.
└── root
    ├── app
    │   ├── controllers
    │   │   ├── IndexController.php
    │   │   ├── SignupController.php
    │   │   └── UsersController.php
    │   ├── models
    │   │   └── Users.php
    │   └── views
    │   │   ├── index
    │   │   │   └── index.phtml // all users
    │   │   ├── signup
    │   │   │   ├── index.phtml // register form
    │   │   │   └── register.phtml // after register
    │   │   ├── users
    │   │   │   ├── delete.phtml // after delete
    │   │   │   ├── edit.phtml // edit page
    │   │   │   └── show.phtml // read 1
    │   │   └── index.phtml // for layouts
    └── public
    │   ├── .htaccess
    │   └── index.php // entry point
    └── vendor // for syntax linting only
    │   ├── composer
    │   ...
    └── .gitignore
    └── .htaccess
    └── .htrouter
    └── .composer.json
    └── .composer.lock
    └── .README.md
```

## Installation
1. Clone project using this command
```
git clone https://github.com/kareemshaaban221/phalcon-crud.git
```
2. Run ```composer install``` command
```
composer install
```
Note: if composer.json not found run this instead
```
composer require phalcon/ide-stubs --dev
```
Note: this command not important in production environment<br><br>
3. Create database and name it `phalcon_test`<br><br>
4. Copy the query mentioned above to create `users` table<br><br>
5. Run apache server and visit the directory of the project from your browser http://localhost/phalcon<br><br>
6. Enjoy testing 😃<br><br>

## Setup Phalcon
Firstly: We need to know that Phalcon framework is not like other PHP frameworks specifically in its installation process.

These all because Phalcon is a C-extension that we need to add manually to apache extensions in our servers `php/ext` file

1. We need to download PSR dll and pdb files from <a href="https://pecl.php.net/package/psr" target="_blank">here</a> (<a href="https://downloads.php.net/~windows/pecl/releases/psr/1.2.0/php_psr-1.2.0-8.1-ts-vs16-x64.zip" target="_blank">PSR v1.2.0 TS PHP v8.1</a>)
2. We need to download Phalcon dll file and this file is the whole framework and will be added as an C-extension and this is for performance reasons. <a href="https://github.com/phalcon/cphalcon/releases/tag/v5.6.2" target="_blank">download</a> (<a href="https://github.com/phalcon/cphalcon/releases/download/v5.6.2/php_phalcon-php8.1-ts-windows-vs16-x64.zip" target="_blank">Phalcon v5.6.2 TS PHP v8.1</a>)
3. After extracting zip files copy these 3 files to `path_to_php_dir/ext` folder:
    - php_psr.dll
    - php_psr.pdb
    - php_phalcon.dll
4. Now we need to ensure these extensions are read by phpinfo, so restart your apache server and then go to phpinfo and search using those 2 keywords `psr` and `phalcon`.
5. If you find these extensions installed successfully, Congrates 🎉 phalcon is installed in your machine.

<br><br>

ref: https://www.youtube.com/watch?v=pqwN0fsZn-s
<br>
docs: https://docs.phalcon.io/5.6/tutorial-basic/
