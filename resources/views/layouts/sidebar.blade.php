<div class="sidebar" id="sidebar">
    <header>
        <a href="{{route('post.index')}}">Laravel Social</a>

    </header>

    <ul class="list-unstyled components">
        @auth
            <li>
                <a href="{{route('post.index')}}" class="d-flex justify-content-between align-items-center">
                    Home
                    <i class="fa fa-home"></i>
                </a>
            </li>
            <li>
                <a href="{{route('profile.show',['user'=>auth()->user()])}}"
                   class="d-flex justify-content-between align-items-center">
                    My profile
                    <i class="fa fa-user"></i>
                </a>
            </li>
            <li>
                <a href="{{route('profile.show',['user'=>auth()->user()])}}"
                   class="d-flex justify-content-between align-items-center">
                    Following
                    <i class="fa fa-group"></i>
                </a>
            </li>
        @endauth
        <li>
            <a href="{{route('profile.index')}}" class="d-flex justify-content-between align-items-center">
                Search
                <i class="fa fa-search"></i>
            </a>
        </li>
    </ul>
</div>
