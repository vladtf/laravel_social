@extends('layouts.app')

@section('content')
    <div class="container container-sm">
        <div class="pt-5 row">
            <div class="col-md-4 p-5" style="margin: 1px auto;">
                <img
                    src="https://instagram.fkiv1-1.fna.fbcdn.net/v/t51.2885-15/e35/s150x150/91714430_341255496835016_6621251509665063906_n.jpg?_nc_ht=instagram.fkiv1-1.fna.fbcdn.net&_nc_cat=108&_nc_ohc=LhUb5an93MIAX-rsVS1&oh=240df0d1c72b309b1b172f8248bf3229&oe=5EBE161B"
                    class="rounded-circle p-3 w-100">
            </div>
            <div class="col-md-8 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1>{{ $user->username }}</h1>
                    <a href="/p/create">Add new posts</a>
                </div>
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
                    <img src="/storage/{{$post->image}}" class="w-100" alt="">


{{--                    CSS Squaring--}}
{{--                    <div class="square"--}}
{{--                         style="background-image: url('/storage/{{$post->image}}');">--}}
{{--                    </div>--}}
                </div>
            @endforeach
        </div>
    </div>

@endsection
