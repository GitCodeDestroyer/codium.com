<?php

namespace Database\Factories\Courses;

use App\Models\Courses\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'name' => $this->faker->word(),
            'time' => $this->faker->time(),
            'difficulty' => $this->faker->numberBetween(1, 4),
            'type' => $this->faker->numberBetween(1, 6),
            'necessity' => $this->faker->numberBetween(1, 3),
            'about' => $this->faker->text()
        ];
    }
}
