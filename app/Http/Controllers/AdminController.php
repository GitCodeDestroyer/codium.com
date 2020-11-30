<?php

namespace App\Http\Controllers;

use App\Models\Courses\Course;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('pages.admin.home', [
            'route' => 'home'
        ]);
    }

    public function newCourse(Course $course)
    {
        $courses = $course->getTable();

        return view('pages.admin.new.course', [
            'route' => 'course',
            'courses' => $courses
        ]);
    }
}
