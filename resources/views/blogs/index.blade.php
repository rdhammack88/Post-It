@extends('layouts.app')
@section('content') {{--
<div class="row mb-4 text-right">
    <div class="col-12">
        <span class="text-danger fade-text">Most Recent Blog Posts...</span>
    </div>
</div> --}}

<!-- Confirm User is Logged In and Display "Add new blog" Button -->
@if (Auth::user() && Route::is('user_blogs')) @if (count($blogPosts))
<div class="row my-5">
    <div class="col-2 ml-auto mr-4 mr-md-0">
        <span class="sr-only" aria-hidden="true">Add new blog</span>
        <a href="/blogs/create" class="btn btn-outline-secondary add-btn">
                    <span class="fa fa-plus"></span> New
                </a>
    </div>
</div>
@endif @endif
<!-- End Display "Add new blog" Button -->

<section id="blogSection" class="row">
    <!-- If the count of blogPosts !== 0 -->
    @if (count($blogPosts))
    <div class="col-md-3 d-none d-md-flex">
    @include('inc.sidebar')
    </div>
    <div class="col-12 col-md-8 offset-md-1">

        <!-- For each blog post -->
        @foreach ($blogPosts as $blogPost)
        <!-- For each blog post, include the Blog component to display -->
    @include('components.blog.blog')
        <!-- End of for each blog post -->
        @endforeach
        <!-- If there are not any recent posts -->
        @else
        <div class="col-12 col-md-10 offset-md-1">
            <p class="lead">
                There are no recent posts.
                <span class="sr-only" aria-hidden="true">Add new blog</span>
                <a href="/blogs/create" class="add-btn get-started-btn">Get started</a> now putting your thoughts out there
                for others to read.
            </p>
        </div>
    </div>
    <!-- End of count of blogPosts !== 0 -->
    @endif
</section>
@endsection
 {{-- <i class="far fa-thumbs-down" aria-hidden="true"></i>
<i class="far fa-star" aria-hidden="true"></i> --}}
