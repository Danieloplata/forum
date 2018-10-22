<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadTest extends TestCase
{

	use RefreshDatabase;

    /** @test */
    public function a_thread_is_owned_by_a_user()
    {
        $thread = factory('App\Thread')->create();

        $this->assertInstanceOf('App\User', $thread->user);
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $thread = factory('App\Thread')->create();

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $thread->replies);
    }

}
