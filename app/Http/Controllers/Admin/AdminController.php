<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.home', [
            'route' => 'home'
        ]);
    }

    public function show_new_course(Course $course)
    {
        $courses = $course->getTable();

        return view('pages.admin.new.course', [
            'location' => 'course',
            'courses' => $courses
        ]);
    }

    public function show_new_lesson(Course $course)
    {
        return view('pages.admin.new.lesson', [
            'names' => $course->getNames()
        ]);
    }

    public function store_new_course(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:40',
            'title' => 'required|unique:courses|max:40',
            'time' => 'required',
            'difficulty' => 'required',
            'necessity' => 'required',
            'type' => 'required',
            'about' => 'required',
        ]);

        if ($validator->fails()) {
                return redirect(route('admin_show_new_course'))
                            ->withErrors($validator)
                            ->withInput();
            }

        DB::table('courses')->insert([
            'name' => $request->name,
            'title' => $request->title,
            'time' => $request->time,
            'difficulty' => $request->difficulty,
            'necessity' => $request->necessity,
            'type' => $request->type,
            'about' => $request->about,
        ]);
        return redirect(route('admin_show_new_course'));
    }
}
