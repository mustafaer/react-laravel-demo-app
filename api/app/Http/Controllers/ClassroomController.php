<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Classroom;
use App\Http\Resources\ClassroomResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ClassroomController extends Controller
{

    public function index()
    {
        $classrooms = Classroom::all();
        return ClassroomResource::collection($classrooms);
    }

    public function store(Request $request)
    {
        $classroom = new Classroom;
        $classroom->name = $request->input('name');

        if($classroom->save()) {
            return new ClassroomResource($classroom);
        }

    }

    public function show($id)
    {
        $classroom = Classroom::findOrFail($id);
        return new ClassroomResource($classroom);
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::findOrFail($id);

        $classroom->name = $request->input('name');

        if($classroom->update()) {
            return new ClassroomResource($classroom);
        }
    }

    public function destroy($id)
    {
        $classroom = Classroom::destroy($id);

        if($classroom) {
            return response('Successfully Deleted', 200);
        }
    }
}