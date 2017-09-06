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
        // use eloquent
        // $students = Student::all();
	    $students = Student::orderBy('updated_at', 'desc') -> get();
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
        /*
        $rules =
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required',
                'career' => 'required|in:engineering,math,physics'
            ];

        $this->validate($request, $rules);
        */
        $this->validateRequest($request);
        $student = Student::create($request->all());
        return $this->createSuccessResponse("The student with id ($student->id) has been created" , 200);

    }

    // use x-www-form-urlencoded instead of form-data
	// https://gist.github.com/joyrexus/524c7e811e4abf9afe56
    public function update(Request $request, $student_id)
    {
        $student = Student::find($student_id);


        if($student)
        {
            $this->validateRequest($request);
            $student->name = $request->get('name');
            $student->phone = $request->get('phone');
            $student->address = $request->get('address');
            $student->career = $request->get('career');

            $student->save();

            return $this->createSuccessResponse("The student with id ($student->id) has been updated", 200);
        }
        return $this->createErrorResponse("The student with id ($student_id), does not exit", 404);

    }

    public function destroy($student_id)
    {
        $student = Student::find($student_id);

        if($student)  {
               $student->courses()->detach();
               $student->delete();
               return $this->createSuccessResponse("The student with id ($student_id) has been removed", 200);
        }
        return $this->createErrorResponse("The student with id ($student_id), does not exit", 404);
        
    }

    function validateRequest($request)
    {
        $rules =
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required',
                'career' => 'required|in:engineering,math,physics'
            ];

        $this->validate($request, $rules);
    }
}