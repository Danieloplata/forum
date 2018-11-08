@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Thread -->
            <div>
                <h4>Thread:</h4>
            </div>
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->user->name }}</a>
                    posted: {{ $thread->title }}
                </div>
                <div class="card-body">
                    {{ $thread->body }}
                </div>
            </div>
            <br />
            <!-- End of Thread -->
                        
            <!-- Replies -->
            <div>
                <h4>Replies:</h4>
            </div>
            @foreach ($thread->replies as $reply)
                @include ('threads.reply')
            @endforeach
            <!-- End of Replies -->
            
            <!-- The reply form -->
            @if (auth()->check())
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('addReplyToThread', $thread->id) }}">
                            @csrf
                            <div class="formgroup">
                                <textarea name="body" class="form-control" id="addReplyToThread" placeholder="Have something to say?" rows="5"></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-default">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
            <!-- End of reply form -->

        </div>
    </div>
</div>
@endsection