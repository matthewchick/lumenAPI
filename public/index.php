<?php

/*
 * 1. Create 3 models for student, courses and teacher
 *    Set the relationship among students, courses and teachers
 *    php artisan make:migration create_students_table --create=students
 * 2. run php artisan migrate inside Homestead in order to create table inside mysql
   3. Insert seed data by using $faker defined in ModelFactory.php => using php artisan db:seed
      https://laravel.com/docs/5.1/seeding#using-model-factories
   4. Use chrome postman
 */
/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| First we need to get an application instance. This creates an instance
| of the application / container and bootstraps the application so it
| is ready to receive HTTP / Console requests from the environment.
|
*/

$app = require __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$app->run();
