@extends('layouts.app')

@section('content')
    <div class="container p-2"
         style="background-color: rgba(139, 188, 232, 0.34); box-shadow: 0 0 0 1px rgba(255,255,255,0.76)">
        <div class="row p-2">

            {{-- Post image --}}
            <div class="col-md-8 p-2">
                <img src="/storage/{{$post->image}}" class="img-fluid" id="post-col-1">
            </div>
            {{-- End Post image --}}

            {{-- post body --}}
            <div class="col-md-4 p-2">
                <div class="container" id="post-col-2">

                    {{-- Header --}}
                    <div class="row" id="post-header">
                        <div class="container">
                            <div class="row align-items-center justify-content-around">
                                <div class="col-6">
                                    <a href="/profile/{{ $post->user->id }}" class="font-weight-bold text-dark"
                                       style="text-decoration: none;">
                                        <img src="{{ $post->user->profile->profileImage() }}"
                                             class="rounded-circle w-50">
                                        <span>
                                            {{ $post->user->username }}
                                        </span>
                                    </a>
                                </div>
                                <div class="col-6">
                                    <follow-button user-id="{{$post->user->id}}"
                                                   follows="{{ $follows }}">
                                    </follow-button>
                                </div>
                            </div>
                            <hr>
                            <div class="row px-3 pb-1">
                                <small class="text-dark">{{ $post->created_at->format('d-m-y')}} </small>
                            </div>
                            <div class="row px-2">
                                <a class="px-2" href="/profile/{{ $post->user->id }}">
                                    {{ $post->user->username }}
                                </a>
                                <p class="px-2">
                                    {{ $post->caption }}
                                </p>
                            </div>
                            <hr>
                            <div class="row px-3">
                                <div class=""><strong>{{$post->comments->count()}}</strong> comments</div>
                            </div>
                        </div>
                    </div>
                {{-- End header --}}

                <!-- Comments -->
                    <div class="row d-block list-group overflow-auto comment-block" id="post-comments"
                         style="background: rgba(174,206,236,0.11); color: #1e433a;">
                        @foreach($post->comments as $comment)
                            <a href="/profile/{{$comment->user->id}}"
                               class="list-group-item list-group-item-action flex-column align-items-start border-bottom border-primary">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{$comment->user->name}}</h5>
                                    <small>{{$comment->created_at->diffForHumans()}}</small>
                                </div>
                                <p class="mb-1">{{$comment->comment}}</p>
                            </a>
                        @endforeach
                    </div>
                    <!-- End comments -->

                    <!-- Footer -->
                    <div class="row p-2" id="post-footer">
                        <form action="/comment/{{$post->id}}" method="post" class="text-center w-100"
                              style="border: 1px rgba(160,208,173,0.05) solid;">
                            @csrf
                            <input id="comment" type="text"
                                   class="form-control" name="comment"
                                   value="{{ old('comment') }}" placeholder="Comment ..." required
                                   autocomplete="comment"/>
                            <button class="btn btn-info" type="submit">Add comment</button>
                        </form>
                    </div>
                    <!-- End footer -->
                </div>
                <!-- End Post Body -->
            </div>
            {{-- End post image --}}
        </div>
    </div>
    </div>
@endsection
