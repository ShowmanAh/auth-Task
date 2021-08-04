# auth-task
This repository contains my code for the [Laravel Web Development](https://laravel.com/docs/7.x) Docs.

auth-task is a [Laravel](https://laravel.com/docs/7.x) authenticated user with regiser, login, logout, change role , create user and assign role to it.

### Prerequisites:
The application was built using [Laravel 7], so you should ensure you have it installed on your machine.

 requirements : PHP >= 7.2.5.

### Features:
- Register user service.
- login user service.
- logout user service.
- Change user role.
- Create user with assign role.

### Technologies:
### Back-End :
- Laravel 7.2, MVC Architecture Pattern.

 ### Database :
 - mySql.
 
### Usage:
1. Clone this repository to your desktop, go to the ```auth-task``` directory.

2. Install the application requirements:
```composer
 composer install 
 npm install
 cp .env.example .env
 php artisan key:generate
 php artisan migrate
 php artisan db:seed
```

3. Run the application and go to(http://localhost/Task/api/login) to see the application running
4. Api docs ()

### License:
This software is licensed under the [MIT License](https://laravel-guide.readthedocs.io/en/latest/license/).
