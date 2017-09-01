<?php
/**
 * Created by PhpStorm.
 * User: Matthewchick
 * Date: 18/8/2017
 * Time: 5:59 PM
 */

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        //use eloquent
        $teachers = Teacher::all();
        return $this->createSuccessResponse($teachers, 200);
        //return response()->json(['data'=>$courses], 200);
        // return __METHOD__;
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        if ($teacher){
            return $this->createSuccessResponse($teacher, 200);
        }
        return $this->createErrorResponse("The teacher with id ($id), does not exit", 404);
    }

    public function store(Request $request)
    {
        $rules =
            [
                'name' => 'required',
                'phone' => 'required|numeric',
                'address' => 'required',
                'profession' => 'required|in:engineering,math,physics'
            ];

        $this->validate($request, $rules);
        $teacher = Teacher::create($request->all());
        return $this->createSuccessResponse("The teacher with id ($teacher->id) has been created" , 201);

    }

    public function update()
    {
        return __METHOD__;
    }

    public function destroy($teacher_id)
    {
        $teacher = Teacher::find($teacher_id);

        if($teacher)  {
            $courses = $teacher->courses;
            if (sizeof($courses) > 0)
            {
                return $this->createErrorResponse('You can\'t remove a teacher with active courses. Please remove those courses first', 409);
            }
            $teacher->delete();
            return $this->createSuccessResponse('The student with id ($teacher_id) has been removed', 200);
        }
        return $this->createErrorResponse("The student with id ($teacher_id), does not exit", 404);

    }

}