<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Laravel Social</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
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
    </nav>

</div>
