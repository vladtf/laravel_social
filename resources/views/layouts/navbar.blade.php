<nav class="navbar navbar-expand-md shadow-sm navbar-style navbar-light fixed-top" id="navbar">
    <div class="container-fluid">

        <a class="navbar-brand d-flex pb-2" href="{{ url('/') }}">
            <div>
                <img src="/svg/laravelSocialLogo.svg" class="pr-3"
                      style="height: 20px; border-right: 1px solid #e2e3e5;"></div>
            <div class="text-light pl-3">Home</div>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon text-light"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a href="/profile/{{ auth()->id() }}" class="nav-link">My profile</a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile/following" class="nav-link">Following</a>
                    </li>
                @endauth

                <li class="nav-item">
                    <a href="/profile" class="nav-link">Search</a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    <div id="navbarDropdown" class="nav-link dropdown-toggle" role="button" style="cursor: pointer"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->username }} <span class="caret"></span>
                    </div>
                    <li class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-right p-2" style="background-color: rgba(38,102,62,0.21);" aria-labelledby="navbarDropdown">
                            <a href="{{route('profile.show',['user'=>auth()->id()])}}"
                               class="dropdown-item">
                                My Profile
                            </a>
                            <a href="{{route('profile.following')}}"
                               class="dropdown-item">
                                Following
                            </a>
                            <a href="{{route('profile.edit',['user'=>auth()->id()])}}"
                               class="dropdown-item">
                                Edit profile
                            </a>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
