<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Course
 */
class Course extends Model
{
    use HasFactory;

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
        return $this->table;
    }

    /**
     * Adds a new course
     * @param $name
     * @param $time
     * @param $title
     * @param $difficulty
     * @param $need
     * @param $type
     * @param $about
     * @return mixed
     */
    public function addCourse($name, $time, $title, $difficulty, $need, $type, $about)
    {
        return factory(Course::class, 1)->create([
            'name' => $name,
            'time' => $time,
            'title' => $title,
            'difficulty' => $difficulty,
            'need' => $need,
            'type' => $type,
            'about' => $about
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
