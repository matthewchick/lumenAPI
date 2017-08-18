<?php

use Illuminate\Database\Seeder;

use App\Teacher;
use App\Student;
use App\Course;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * https://laravel.com/docs/5.1/seeding#using-model-factories
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0'); //remove foreign key

        Teacher::truncate();    // Teacher is a class coming from Teacher.php
        Student::truncate();
        Course::truncate();
        DB::table('course_student')->truncate();

        factory(Teacher::class, 50)->create();
        factory(Student::class, 500)->create();
        factory(Course::class, 50)->create()->each(function($course)
        {
            $course->students()->attach(array_rand(range(1,500), 40));
        });
        // $this->call('UsersTableSeeder');
    }
}
