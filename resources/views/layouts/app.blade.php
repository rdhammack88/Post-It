<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
    @include('inc.navbar')

        <main class="container mb-5 py-0">
            {{--
            <!-- Confirm User is Logged In and Display "Add new blog" Button -->
            @if (Auth::user() && (Route::is('dashboard*') || Route::is('user_blogs')))
            <div class="row my-5">
                <div class="col-2 ml-auto mr-4 mr-md-0">
                    <span class="sr-only" aria-hidden="true">Add new blog</span>
                    <a href="/blogs/create" class="btn btn-outline-secondary add-btn">
                        <span class="fa fa-plus"></span> New
                    </a>
                </div>
            </div>
            @endif
            <!-- End Display "Add new blog" Button -->--}}
            <!-- Display All App Extended Content -->
            @yield('content')
        </main>
    </div>


</body>

</html>
{{-- Request::is('/dashboard') --}}
