@extends('layouts.app')

@section('content')
    <div class="container container-sm">
        <div class="pt-5 row">
            <div class="col-md-4 p-5" style="margin: 1px auto;">
                <img
                    src="{{ $user->profile->profileImage() }}"
                    class="rounded-circle w-100" alt="">
            </div>
            <div class="col-md-8 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>

                    @can('update', $user->profile)
                        <a href="/p/create">Add new posts</a>
                    @endcan

                </div>

                @can('update', $user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan

                <div class="d-flex">
                    <div class="pr-5"><strong>100k</strong> followers</div>
                    <div class="pr-5"><strong>200</strong> following</div>
                    <div class="pr-5"><strong>{{$user->posts->count()}}</strong> posts</div>
                </div>
                <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-md-4 p-4">
                    <a href="/p/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" class="w-100" alt="">
                    </a>


                    {{--                    CSS Squaring--}}
                    {{--                    <div class="square"--}}
                    {{--                         style="background-image: url('/storage/{{$post->image}}');">--}}
                    {{--                    </div>--}}
                </div>
            @endforeach
        </div>
    </div>

@endsection
