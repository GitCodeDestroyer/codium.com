<?php

namespace Tests;

use App\Models\Courses\Course;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function sign_in_as_admin($user = null)
    {
        $user = User::factory([
            'name' => 'Admin'
        ])->make();

        $this->actingAs($user);
    }

    protected function sign_in($user = null)
    {
        $user = User::factory()->make();

        $this->actingAs($user);
    }

    protected function create_new_course()
    {
        return Course::factory()->make();
    }
}
