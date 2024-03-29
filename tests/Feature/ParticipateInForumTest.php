<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function a_guest_may_not_reply_to_threads()
    {
    	$this->expectException('Illuminate\Auth\AuthenticationException');

		$this->post('/threads/1/replies', []);
	}

	/** @test */
	public function an_authenticated_user_can_reply_to_threads()
    {
	    $this->be($user = factory('App\User')->create());

	    $thread = factory('App\Thread')->create();

	    $reply = factory('App\Reply')->make();

		$this->post($thread->path() . '/replies', $reply->toArray());

		$this->get($thread->path())
			->assertSee($reply->body);
	}
}
