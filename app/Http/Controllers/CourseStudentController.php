<?php
/**
 * Created by PhpStorm.
 * User: Matthewchick
 * Date: 18/8/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers;

use App\Course;

class CourseStudentController extends Controller
{
	// lumenapi.com/courses/1/students
    public function index($course_id)
    {
        $course = Course::find($course_id);
        if ($course)
        {
			$students = $course->students;
	        return $this->createSuccessResponse($students, 200);
        }
	    return $this->createErrorResponse("Does not exists a course with the given id", 404);
    }

    public function store()
    {
        return __METHOD__;
    }

    public function show()
    {
        return __METHOD__;
    }

    public function update()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }

}