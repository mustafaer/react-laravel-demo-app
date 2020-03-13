<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lesson;
use App\Http\Resources\LessonResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LessonController extends Controller
{
    public function index()
    {
        $lessons = Lesson::all();
        return LessonResource::collection($lessons);
    }

    public function store(Request $request)
    {
        $lesson = new Lesson;
        $lesson->name = $request->input('name');
        $lesson->classroom_id = $request->input('classroom_id');

        if($lesson->save()) {
            return new LessonResource($lesson);
        }

    }

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return new LessonResource($lesson);
    }

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->name = $request->input('name');

        if($lesson->update()) {
            return new LessonResource($lesson);
        }
    }

    public function destroy($id)
    {
        $lesson = Lesson::destroy($id);

        if($lesson) {
            return response('Successfully Deleted', 200);
        }
    }
}
