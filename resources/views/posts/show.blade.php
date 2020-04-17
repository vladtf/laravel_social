@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center">
                    <div class="pr-2">
                        <a href="/profile/{{ $post->user->id }}">
                        <img src="{{ $post->user->profile->profileImage() }}" class="w-100 rounded-circle"
                             style="max-width: 100px;" >
                        </a>

                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}">
                                <span class="text-dark">{{ $post->user->username }}</span>
                            </a>
                            <a href="#" class="pl-3">Follow</a>
                        </div>
                    </div>
                </div>

                <hr/>
                <small style="color: #2c7036;">{{ $post->created_at->format('d-m-y')}}</small>
                <p><span class="font-weight-bold">
                        <a class="pr-2" href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>{{ $post->caption }}
                </p>
                {{$post->comments->count()}}
            </div>
        </div>
    </div>
@endsection
