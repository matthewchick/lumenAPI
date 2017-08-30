<?php
/**
 * Created by PhpStorm.
 * User: Matthewchick
 * Date: 18/8/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers;

use App\Course;

class CourseController extends Controller
{
    public function index()
    {
        //use eloquent
        $courses = Course::all();
        return $this->createSuccessResponse($courses, 200);
        //return response()->json(['data'=>$courses], 200);
        // return __METHOD__;
    }

    public function show($id)
    {
        $course = Course::find($id);
        if ($course){
            return $this->createSuccessResponse($course, 200);
        }
        return $this->createErrorResponse("The course with id ($id), does not exit", 404);
    }



}