<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Courses\Course;

class DashboardController extends Controller
{
    public function index()
    {
            $recent = auth()->user()->recent;

            // Check, if recent course is not 'null' or 'not defined' - pass the 'recent' course's cleared exercises 'percent'
            if (isset($recent)) {
                // Getting data from 'DB'
                $recent_course = Course::with_name($recent);

                // Check, if recent course is not 0 (integer)
                if ($recent != 0) {
                    // 100% / ('exercises count' / 'cleared exercises count')
                    $percent = round(100 / ($recent_course->exercises / $recent));
                } else {
                    $percent = 0;
                }

                // Giving View with data
                return view('pages.dashboard', [
                    'percent' => $percent,
                    'recent_course' => $recent_course
                ]);
//                 return 'hello';
            } else {
                // Giving View without data
                return view('pages.dashboard');
            }
    }
}
