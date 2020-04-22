@extends('layouts.app')

@section('content')
    <div class="container container-sm">
        <div class="pt-5 row">
            <div class="col-md-4 p-5" style="margin: 1px auto;">
                <img
                    src="{{ $user->profile->profileImage() }}"
                    class="rounded-circle w-100 border border-light" alt="">
            </div>
            <div class="col-md-8 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex align-items-center pb-2">
                        <div class="h4">{{ $user->username }}</div>

                        <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                    </div>

                    @can('update', $user->profile)
                        <a href="/p/create">Add new posts</a>
                    @endcan

                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>{{ $postsCount }}</strong> posts</div>
                    <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
                    <div class="pr-5">
                        <a href="{{route('profile.following')}}" class="text-dark">
                            <strong>{{ $followingCount }}</strong> following
                        </a>
                    </div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-md-4 p-4 ">
                    <div class="profile-post-style">
                        <a href="/p/{{$post->id}}">
                            <img src="/storage/{{$post->image}}" class="w-100" alt="">
                        </a>
                    </div>

                    {{--                    CSS Squaring--}}
                    {{--                    <div class="square"--}}
                    {{--                         style="background-image: url('/storage/{{$post->image}}');">--}}
                    {{--                    </div>--}}
                </div>
            @endforeach
        </div>
    </div>

@endsection
