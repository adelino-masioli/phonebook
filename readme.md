# Phone Book

Project developed with PHP / Laravel 5.8, with the implementation of a Roles and Permissions authentication system, which allows the creation of new user accounts, login and password recovery.
This application is intended to support other developers who need to quickly create modules with different levels of authentication and which can manage through a control panel.
Below is how to install and run locally or on a remote server.

# Instructions

# Requirements

```
PHP >= 7.2.5
BCMath PHP Extension
Ctype PHP Extension
Fileinfo PHP extension
JSON PHP Extension
Mbstring PHP Extension
OpenSSL PHP Extension
PDO PHP Extension
Tokenizer PHP Extension
XML PHP Extension
NodeJS
```

* Laravel utilizes [Composer](https://getcomposer.org/) to manage its dependencies. 

* I always recommend using [Laradock](https://laradock.io/), as it is faster and easier to create a Laravel environment.


# Installation
* First make the application clone in an already configured environment. git clone https://github.com/alfjuniorbh/phonebook
* After cloning the application, to rename the directory just execute the command: mv master phonebook
* To access the application just type: cd phonebook
* Some dependencies need to be installed, for this: composer install
* Assets need to be compiled, so the commands: npm install so that all dependencies are satisfied
* You will need to create a database and provide credentials by changing the .env file at the root of the project
* The time has come for migrations: php artisan migrate
* The first load of data is ready to be inserted into the system: php artisan db: seed
* Ready, just upload the server with the command (if Docker / Laradock is not configured): php artisan serve
* The default data for the Administrator are: adelinomasioli@gmail.com / 123456
* Enjoy


# Below are some prints of the application pages

![Login Page](/public/images/github/1.png)
![Register Page](/public/images/github/2.png)
![Reset Passoword Page](/public/images/github/3.png)
![Contacts Page](/public/images/github/4.png)
![Create New Contact Page](/public/images/github/5.png)
![Edit Contact Page](/public/images/github/6.png)
![Users Page](/public/images/github/7.png)
![Create New User Page](/public/images/github/8.png)
![Roles Page](/public/images/github/9.png)
![Create New Role Page](/public/images/github/10.png)
![Logs Page](/public/images/github/11.png)
