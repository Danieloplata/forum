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

        </div>
    </div>
</div>
@endsection