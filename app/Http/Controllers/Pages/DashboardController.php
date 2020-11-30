<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Check, if user ARE NOT signed in redirect him into '/signin' page
        if (!Auth::check()) {
            return redirect()->intended('/signin');
        }
        else {
//            if (isset(Auth::user()->recent)) {
//                $recent = Auth::user()->recent;
//            }
//
//            // Check, if recent course is not 'null' or 'not defined' - pass the 'recent' course's cleared exercises 'percent'
//            if (isset($recent)) {
//                // Getting data from 'DB'
//                $courses = DB::table('courses')->get(); // Select all data from courses
//                $recentCourse = DB::table('courses')->where('name', $recent)->get(); // if recent course is html, this = 'html row'
//
//                // Check, if recent course is not 0 (integer)
//                if (Auth::user()->$recent != 0) {
//                    // 100% / ('exercises count' / 'cleared exercises count')
//                    $percent = round(100 / ($recentCourse[0]->exercises / Auth::user()->$recent));
//                } else {
//                    $percent = 0;
//                }
//
//                // Giving View with data
//                return view('pages.dashboard', ['percent' => $percent,
//                                          'recent' => $recent,
//                                          'courses' => $courses,
//                                          'title' => $recentCourse[0]->title,
//                                          'about' => $recentCourse[0]->about,
//                                          'count' => 0,
//                                          'allCourses' => array('html','css','javascript')
//                                         ]);
//                // return 'hello';
//            } else {
                // Giving View without data
                return view('pages.dashboard');
//            }
        }
    }
}
