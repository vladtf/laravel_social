<div class="sidebar">
    <header>Laravel Social</header>

    <ul class="list-unstyled components">
        <li>
            <a href="{{route('post.index')}}">Home</a>
        </li>
        <li>
            <a href="{{route('profile.show',['user'=>auth()->user()])}}">My profile</a>
        </li>
        <li>
            <a href="{{route('profile.index')}}">Search</a>
        </li>
    </ul>
</div>
