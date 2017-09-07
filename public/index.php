<?php

/*
 * 1. Create 3 models for student, courses and teacher
 *    Set the relationship among students, courses and teachers
 *    php artisan make:migration create_students_table --create=students
 * 2. run the command 'php artisan migrate' inside Homestead in order to create tables inside mysql
   3. Insert seed data by using $faker defined in ModelFactory.php => using php artisan db:seed
      https://laravel.com/docs/5.1/seeding#using-model-factories
   4. Use chrome postman
   5. Create 5 controllers and set route inside 'web.php' inside routes folder
   6. https://learninglaravel.net/how-to-get-route-list-in-lumen-as-like-as-laravel
      composer require thedevsaddam/lumen-route-list => add command => php artisan route:list
      add the following to app.php
      $app->register(\Thedevsaddam\LumenRouteList\LumenRouteListServiceProvider::class);
      inside bootstrap folder
   7. composer require wn/lumen-generators =>
      Then add the service provider in the file app/Providers/AppServiceProvider.phplike the following:
        public function register()
        {
            if ($this->app->environment() == 'local') {
                $this->app->register('Wn\Generators\CommandsServiceProvider');
            }
        }
       https://github.com/webNeat/lumen-generators
       php artisan route:list
       https://laravel.com/docs/5.1/eloquent#retrieving-multiple-models
    8. insert a record => use Illuminate\Http\Request;
    9. edit and delete a record
       lumen for microservice
       https://medium.com/@poweredlocal/developing-a-simple-api-gateway-in-php-and-lumen-f84756cce043
       lumen with mongodb
       https://medium.com/@rafaelcpalmeida/how-to-use-mongodb-with-your-lumen-api-e13f36fa0aa6
   10. how to get record from CourseStudentController
   11. Insert data to course table and courseStudent table
   12. Edit and remove
   13. https://www.digitalocean.com/community/tutorials/an-introduction-to-oauth-2
	   https://github.com/lucadegasperi/oauth2-server-laravel  is not allowed
       Use the lumen-passport =>
	   "dusterio/lumen-passport": "^0.1.7" => https://github.com/dusterio/lumen-passport
	   Modify the bootstrap flow (bootstrap/app.php file)
   14. https://github.com/stripe/stripe-php
   15. how to handle exception inside Handler.php
   16  how to check lumen performance
       use ab -t 10 -c 10 http://lumenapi.com/
	   fine-tune performance using composer dump-autoload -o
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
