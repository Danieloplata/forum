<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ParticipateInForumTest extends TestCase
{
	use RefreshDatabase;

	/** @test */
	public function an_authenticated_user_can_reply_to_threads()
    {
    	// Create a user and sign them in
	    $this->be($user = factory('App\User')->create());

	    // Create a thread
	    $thread = factory('App\Thread')->create();

	    // Create a reply
	    $reply = factory('App\Reply')->create();
	    // Post the reply
		$this->post('/threads/' . $thread->id . '/replies', $reply->toArray());

		// Assert that it worked
		$this->get($thread->path())
			->assertSee($reply->body);
	}
}
