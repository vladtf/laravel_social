@extends('layouts.app')

@section('content')
    <div class="container col-xl-4">
        @if( $posts->count() < 1 )
            <a href="/profile" class="text-info" style="color: rgba(27,75,114,0.58); font-size: large">
                Nothing to see here. Go follow someone.
            </a>
        @else
            @foreach($posts as $post)
                <div class="container post-index-style post-style">
                    <div class="row pb-1 align-items-baseline">
                        <a class="col" href="/profile/{{ $post->user->id }}">
                            <span class="text-dark"><strong>{{ $post->user->username }}</strong></span>
                        </a>
                        <small>{{$post->created_at->diffForHumans()}}</small>
                    </div>
                    <div class="row">
                        <a href="/p/{{$post->id}}">
                            <img src="/storage/{{$post->image}}" class="w-100">
                        </a>
                    </div>
                    <div class="row pt-2 pb-4">
                        <div>
                            <p/>
                            <p><span class="font-weight-bold">
                    </span>{{ $post->caption }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts -> links() }}
            </div>
        </div>
    </div>
@endsection
