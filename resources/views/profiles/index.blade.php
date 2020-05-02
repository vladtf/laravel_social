@extends('layouts.app')

@section('content')

    <!-- Search form -->
    <form method="get" class="form-inline text-center d-flex pl-xl-5 align-items-baseline"
          action="{{route('profile.index')}}">
        <i class="fa fa-search" aria-readonly="true"></i>
        <input class="form-control form-control-sm ml-3" type="text" placeholder="Search"
               aria-label="Search" name="search" id="search" value="{{ $search }}">
    </form>

    <div class="container">
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
                             class="rounded-circle w-100 border border-info" alt="no-image">
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
            </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $users -> links() }}
            </div>
        </div>
    </div>
@endsection
