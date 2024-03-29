<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;

class ReplyController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

    public function store(Thread $thread)
    {
    	$thread->addReply([
    		'body' => request('body'),
    		'user_id' => auth()->id()
    	]);

        return view('threads.show', compact('thread'));
    }
}
