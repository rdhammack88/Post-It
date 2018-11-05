<header class="fixed-top">
    <nav class="navbar navbar-expand-md navbar-light bg-light" id="mainNav">
        <div class="container">
            <a class="navbar-brand homeLink" href="{{ url('/') }}">
                <strong>{{ config('app.name', 'Laravel') }}</strong>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                {{--
                <ul class="navbar-nav mr-auto">

                </ul> --}}

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{Request::is('/') ? 'activeLink' : ''}}">
                        <a class="nav-link homeLink " href="{{ route('home') }}">
                                <i class="fa fa-home"></i>
                                Home
                            </a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item {{Request::is('login') ? 'activeLink' : ''}}">
                        <a class="nav-link loginLink" href="{{ route('login') }}">
                            <i class="fa fa-arrow-circle-up"></i>{{ __('Login') }}
                        </a>
                    </li>
                    <li class="nav-item {{Request::is('register') ? 'activeLink' : ''}}" id="signupButton">
                        @if (Route::has('register'))
                        <a class="nav-link signupLink" href="{{ route('register') }}">{{ __('Sign Up') }}</a> @endif
                    </li>
                    @else


                    <li class="nav-item {{Request::is('blogs/user/*') ? 'activeLink' : ''}}">
                        <a href="/blogs/user/{{auth()->id()}}" class="nav-link blogsLink">
                            <span class="fa fa-book" aria-hidden="true"></span> My Blogs
                        </a>
                    </li>



                    <!-- Nav items for mobile devices -->
                    <li class="nav-item d-md-none {{Request::is('dashboard') ? 'activeLink' : ''}}">
                        <a href="{{route('dashboard')}}" class="nav-link blogsLink">
                                <span class="fa fa-book" aria-hidden="true"></span> Dashboard
                            </a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="edit_user_account.php">Edit Profile</a>
                    </li>
                    <li class="nav-item d-md-none">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <span class="fa fa-arrow-circle-down" aria-hidden="true"></span>
                                {{ __('Logout') }}
                            </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>


                    <li class="nav-item dropdown d-none d-md-block">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span> Account
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <li class="nav-item {{Request::is('dashboard') ? 'activeLink' : ''}}">
                                <a class="nav-link dropdown-item blogsLink" href="{{route('dashboard')}}">
                                    <span class="fa fa-book" aria-hidden="true"></span> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link dropdown-item" href="edit_user_account.php">Edit Profile</a>
                            </li>
                            {{-- dropdown-item --}}
                            <li class="nav-item">
                                <a class="nav-link dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <span class="fa fa-arrow-circle-down" aria-hidden="true"></span>
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>


                    <!-- USER DROPDOWN MENU -->
                    {{--
                    <li class="nav-item d-none d-md-block dropdown account">
                        <a class="nav-link" role='listitem'>Account</a>
                    </li> --}}


                    <!-- Nav items for mobile devices -->
                    {{--
                    <li class="visible-xs"><a href="blog_manager.php">Manage Blogs</a></li>
                    <li class="visible-xs"><a href="edit_user_account.php">Edit Profile</a></li>
                    <li class="visible-xs"><a href="logout.php"><span class="glyphicon glyphicon-circle-arrow-down" aria-hidden="true"></span> Log out</a></li>
                    --}}
                    <!-- End of Nav item for mobile devices -->


                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="row search-bar bg-light py-1">
        <div class="container-fluid">
            <form class="col-12 col-sm-10 offset-sm-1 col-xl-6 offset-xl-3" id="searchForm" method="get" autoComplete="off">

                <label htmlFor="search" class="sr-only">
                        Search site by blog title, blog category, blog post,
                        username, or user email
                    </label>
                <div class="input-group input-group-lg mb-3">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search..." />
                    <span class="input-group-append">
                            <button type="button" class="btn btn-outline-secondary" id="searchButton" name="searchButton">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button>
                        </span>
                    <!-- End of .input-group-btn -->
                </div>
                <!-- End of .input-group -->
                <!--  Search list dropdown  -->
                <ul class="search-list list-group hidden"></ul>
                <!-- End of .form-group -->
            </form>
            <!-- End of .searchForm -->
        </div>
        <!-- End of .row -->
    </div>
</header>
