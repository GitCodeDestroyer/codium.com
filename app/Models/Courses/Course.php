<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Course
 */
class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'name',
        'title',
        'time',
        'difficulty',
        'necessity',
        'type',
        'about',
    ];

    /**
     * Returns path to this course
     * @return string
     */
    public function path()
    {
        if (isset($this->name)) {
            return "/courses/{$this->name}";
        }
        return '';
    }

    /**
     * @return string
     */
    public function getTable()
    {
        return DB::table('courses')->get();
    }

    /**
     * @param $attributes
     * @return Course[]|\Illuminate\Database\Eloquent\Collection|LaravelIdea\Helper\App\Models\Courses\_CourseCollection
     */
    public function addCourse($attributes)
    {
        return factory($this, 1)->create([
            'name' => $attributes->name,
            'time' => $attributes->time,
            'title' => $attributes->title,
            'difficulty' => $attributes->difficulty,
            'need' => $attributes->need,
            'type' => $attributes->type,
            'about' => $attributes->about
        ]);
    }

    /**
     * Adds a new lesson to course
     * @param $name
     * @param $about
     * @return mixed
     */
    public function addLesson($name, $about)
    {
        return $this->lessons()->create(['name' => $name, 'about' => $about]);
    }

    /**
     * Returns attached to course lessons
     * @return string
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }
}
