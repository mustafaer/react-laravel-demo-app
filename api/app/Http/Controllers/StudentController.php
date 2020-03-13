<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Http\Resources\StudentResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    public function store(Request $request)
    {
        $student = new Student;
        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->username = $request->input('username');

        if($student->save()) {
            return new StudentResource($student);
        }
    }

    public function show($id)
    {
        $student = Student::findOrFail($id)::with('lessons')->get();
        return response($student);
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $student->name = $request->input('name');
        $student->surname = $request->input('surname');
        $student->username = $request->input('username');

        if($student->update()) {
            return new StudentResource($student);
        }
    }

    public function destroy($id)
    {
        $student = Student::destroy($id);

        if($student) {
            return response('Successfully Deleted', 200);
        }
    }
}
