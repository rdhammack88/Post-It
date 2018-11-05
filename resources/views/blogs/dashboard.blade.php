@extends('layouts.app')
@section('content')
<!-- Display Session Status of User Logged In -->
@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<!-- End of Display Session Status of User Logged In -->


<div class="row">
    <!-- If the count of user blogPosts !== 0 -->
    @if (count($blogPosts))
    <div class="col-12 col-md-8 offset-md-1">
        <div class="row my-5">
            <div class="col-2 ml-auto mr-4 mr-md-0">
                <span class="sr-only" aria-hidden="true">Add new blog</span>
                <a href="/blogs/create" class="btn btn-outline-secondary add-btn">
                        <span class="fa fa-plus"></span> New
                    </a>
            </div>
        </div>
        <ul class="list-group">
            <!-- For each user blog post -->
            @foreach ($blogPosts as $blogPost)
            <li class="list-group-item">
                <span class="blog-title">{{$blogPost->title}}</span>
                <span class="blog-date">{{$blogPost->updated_at}}</span>
                <span class="blog-edit">
                    <a href="blogs/{{$blogPost->id}}/edit" class="btn btn-info">Edit</a>
                </span>
                <span class="blog-delete">
                    <a href="blogs/{{$blogPost->id}}/edit" class="btn btn-info">Delete</a>
                </span>
            </li>
            @endforeach
            <!-- End of for each user blog post -->
        </ul>
        <!-- If user does not have any recent posts -->
        @else
        <div class="col-12 col-md-10 offset-md-1">
            <p class="lead">
                You do not have any recent posts.
                <span class="sr-only" aria-hidden="true">Add new blog</span>
                <a href="/blogs/create" class="add-btn get-started-btn">Get started</a> now putting your thoughts out there
                for others to read.
            </p>
        </div>
    </div>
    @endif
    <!-- End of count of user blogPosts !== 0 -->
</div>
<!-- End of Confirm User is Logged In and Display "Add new blog" Button -->
@endsection
