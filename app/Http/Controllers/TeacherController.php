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
	    $this->validateRequest($request);
        $teacher = Teacher::create($request->all());
        return $this->createSuccessResponse("The teacher with id ($teacher->id) has been created" , 201);

    }

    public function update(Request $request, $teacher_id)
    {
	    $teacher = Teacher::find($teacher_id);


	    if($teacher)
	    {
		    $this->validateRequest($request);
		    $teacher->name = $request->get('name');
		    $teacher->phone = $request->get('phone');
		    $teacher->address = $request->get('address');
		    $teacher->profession = $request->get('profession');

		    $teacher->save();

		    return $this->createSuccessResponse("The teacher with id ($teacher->id) has been updated", 200);
	    }
	    return $this->createErrorResponse("The teacher with id ($teacher_id), does not exit", 404);

    }

    public function destroy($teacher_id)
    {
        $teacher = Teacher::find($teacher_id);

        if($teacher)  {
        	// get many courses taken by a teacher
            $courses = $teacher->courses;
            if (sizeof($courses) > 0)
            {
                return $this->createErrorResponse('You can\'t remove a teacher with active courses. Please remove those courses first', 409);
            }
            $teacher->delete();
            return $this->createSuccessResponse("The student with id ($teacher_id) has been removed", 200);
        }
        return $this->createErrorResponse("The student with id ($teacher_id), does not exit", 404);

    }


	function validateRequest($request)
	{
		$rules =
			[
				'name' => 'required',
				'phone' => 'required|numeric',
				'address' => 'required',
				'profession' => 'required|in:engineering,math,physics'
			];

		$this->validate($request, $rules);
	}
}