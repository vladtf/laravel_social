@extends('layouts.app')

@section('content')

    <div class="container">
            <!-- Search form -->
            <form method="get" class="form-inline text-center d-flex md-form form-sm mt-0 pt-5 pl-xl-5 align-items-baseline" action="{{route('profile.index')}}">
                <i class="fa fa-search" aria-readonly="true"></i>
                <input class="form-control form-control-sm ml-3 w-100" type="text" placeholder="Search"
                       aria-label="Search" name="search" id="search" value="{{ $search }}">
            </form>

        @foreach($users as $user)
            @php
                $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

                $postsCount = $user->getPostsCount();

                $followersCount = $user->getFollowersCount();

                $followingCount = $user->getFollowingCount();
            @endphp

            <div class="pt-5 row">
                <div class="col-md-4 p-5" style="margin: 1px auto;">

                    <a href="/profile/{{$user->id}}" class="text-dark">
                        <img src="{{ $user->profile->profileImage() }}"
                             class="rounded-circle w-100 border border-info" alt="">
                    </a>
                </div>

                <div class="col-md-8 pt-5">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <div class="d-flex align-items-center pb-2">
                            <a href="/profile/{{$user->id}}" class="text-dark">
                                <div class="h4">{{ $user->username }}</div>
                            </a>

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
                        <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
                    </div>

                    <div class="pt-4">{{$user->profile->description}}</div>
                    <div><a href="#">{{$user->profile->url}}</a></div>
                </div>
                @endforeach
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $users -> links() }}
                    </div>
                </div>
            </div>
@endsection
