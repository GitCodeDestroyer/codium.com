<?php

namespace Tests\Feature;

use App\Http\Middleware\VerifyCsrfToken;
use Tests\TestCase;

/**
 * Class AdminPanelTest
 * @package Tests\Feature
 */
class AdminPanelTest extends TestCase
{
    /**
     * Should be: unauthorized users can't get access to admin_new_course page with 'get' and 'post' requests.
     * @test
     * @return void
     */
    public function is_admin_new_course_not_available_for_unauthorized_users()
    {
        $get = $this->get(route('admin_show_new_course'));

        $get->assertRedirect(route('login'));

        $post = $this->post(route('admin_store_new_course'));

        $post->assertRedirect(route('login'));
    }

    /**
     * Should be: authorized normal users can't get access to admin_new_course routes with 'get' and 'post' requests.
     * @test
     * @return void
     */
    public function is_admin_new_course_not_available_for_authorized_normal_users()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $this->sign_in();

        $get = $this->get(route('admin_show_new_course'));
        $get->assertStatus(404);

        $post = $this->post(route('admin_store_new_course'));
        $post->assertStatus(404);
    }

    /**
     * Should be: only admin can get access to admin_new_course routes with 'get' and 'post' requests.
     * @test
     * @return void
     */
    public function is_admin_new_course_available_for_admin()
    {
        $this->withoutMiddleware(VerifyCsrfToken::class);

        $this->sign_in_as_admin();

        $get = $this->get(route('admin_show_new_course'));
        $get->assertStatus(200);

        $post = $this->post(route('admin_store_new_course'));
        $post->assertRedirect(route('admin_show_new_course'));

        $new_course = $this->create_new_course();
        $post = $this->post(route('admin_store_new_course', $new_course->toArray()));
        $post->assertStatus(302);
    }
}
