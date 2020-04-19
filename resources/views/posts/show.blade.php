@extends('layouts.app')

@section('content')
    <div class="container p-2" style="background-color: rgba(139, 188, 232, 0.34)">
        <div class="row p-2">
            <div class="col-md-8 p-2">
                <img src="/storage/{{$post->image}}" class="img-fluid" id="div1">
            </div>
            <div class="col-md-4 p-2 overflow-auto" id="div2" >
                <div class="container" >
                    <div class="row" >
                        <div>
                            <a href="/profile/{{ $post->user->id }}" class="font-weight-bold text-dark"
                               style="text-decoration: none;">
                                <img src="{{ $post->user->profile->profileImage() }}" class="rounded-circle"
                                     style="max-width: 50px">
                                {{ $post->user->username }}
                            </a>
                        </div>
                        <follow-button user-id="{{$post->user->id}}"
                                       follows="{{ auth()->user()->follows }}"></follow-button>
                    </div>

                    <hr/>

                    <div>
                        <small style="color: #2c7036;">{{ $post->created_at->format('d-m-y')}}</small>
                        <p><span class="font-weight-bold">
                        <a class="" href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}</span>
                        </a>
                    </span>{{ $post->caption }}
                        </p>
                        <div class=""><strong>{{$post->comments->count()}}</strong> comments</div>
                    </div>

                    <hr/>

                    <!-- Comments -->
                    <div class="list-group" >
                        @foreach($post->comments as $comment)
                            <li class="list-group-item">
                                <p class="pt-2">{{$comment->comment}}</p>
                            </li>
                        @endforeach
                    </div>

                    <div>
                        <form action="/comment/{{$post->id}}" method="post">
                            @csrf

                            <input id="comment" type="text"
                                   class="form-control mb-4" name="comment"
                                   value="{{ old('comment') }}" placeholder="Comment ..." required autocomplete="comment"/>
                            <button class="btn btn-info btn-block my-4" type="submit">Add comment</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
@endsection
