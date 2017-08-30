<?php
/**
 * Created by PhpStorm.
 * User: Matthewchick
 * Date: 18/8/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers;

use App\Student;

class StudentController extends Controller
{
    public function index()
    {
        //use eloquent
        $students = Student::all();
        return $this->createSuccessResponse($students, 200);
        //return response()->json(['data'=>$courses], 200);
        // return __METHOD__;
    }

    public function show($id)
    {
        $student = Student::find($id);
        if ($student){
            return $this->createSuccessResponse($student, 200);
        }
        return $this->createErrorResponse("The student with id ($id), does not exit", 404);
    }

    public function store()
    {
        return __METHOD__;
    }

    public function destroy()
    {
        return __METHOD__;
    }

}