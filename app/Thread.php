<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;

class Thread extends Model
{

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    public function path()
    {
    	return '/threads/' . $this->id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }

}
