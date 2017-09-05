<?php
/**
 * Created by PhpStorm.
 * User: Matthewchick
 * Date: 18/8/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers;

use App\Teacher;

class TeacherCourseController extends Controller
{
	// lumenapi.com/teachers/1/courses
    public function index($teacher_id)
    {
	    $teacher = Teacher::find($teacher_id);
	    if ($teacher)
	    {
		    $courses = $teacher->courses;
		    return $this->createSuccessResponse($courses, 200);
	    }
	    return $this->createErrorResponse("Does not exists a teacher with the given id", 404);
    }

    public function store()
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