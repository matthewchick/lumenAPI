<?php
/**
 * Created by PhpStorm.
 * User: Matthewchick
 * Date: 18/8/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

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

    // https://laravel.com/docs/5.1/eloquent#basic-inserts
    public function store(Request $request)
    {
        $rules =
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required',
                'career' => 'required|in:engineering,math,physics'
            ];

        $this->validate($request, $rules);
        $student = Student::create($request->all());
        return $this->createSuccessResponse("The student with id ($student->id) has been created" , 200);

    }

    public function update($student_id)
    {
        return __METHOD__;
    }

    public function destroy($student_id)
    {
        $student = Student::find($student_id);

        if($student)  {
               $student->courses()->detach();
               $student->delete();
               return $this->createSuccessResponse('The student with id ($student_id) has been removed', 200);
        }
        return $this->createErrorResponse("The student with id ($student_id), does not exit", 404);
        
    }

}