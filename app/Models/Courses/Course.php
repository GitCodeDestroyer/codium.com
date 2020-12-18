<?php

namespace App\Models\Courses;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Course
 * @method where(string $string, $recent)
 * @method get()
 * @property mixed lessons = @method lessons()
 * @property mixed exercises = @method exercises()
 */
class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * @var string[]
     */
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
     * @return string
     */
    public static function table()
    {
        return DB::table('courses')->get();
    }

    /**
     * @return mixed|null
     */
    public static function names()
    {
        return DB::table('courses')->value('name');
    }

    public static function with_name($recent)
    {
        return (new Course())->where('name', $recent)->first();
    }

    /**
     * Adds a new lesson to course
     * @param $name
     * @param $about
     * @return mixed
     */
    public function add_lesson($name, $about)
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function exercises()
    {
        return $this->hasManyThrough(Exercise::class, Lesson::class);
    }
}
