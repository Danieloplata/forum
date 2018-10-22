<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{
	use RefreshDatabase;

    /** @test */
    public function a_reply_is_owned_by_a_user()
    {
        $reply = factory('App\Reply')->create();

        $this->assertInstanceOf('App\User', $reply->user);
    }
}
