@extends('layouts.app')
@section('content')
<div class="row mb-4 text-right">
    <div class="col-12">
        <span class="text-danger fade-text">Most Recent Blog Posts...</span>
    </div>
</div>
<section id="blogSection" class="row">
    <div class="col-md-3 d-none d-md-flex">
    @include('inc.sidebar')
    </div>
    <div class="col-12 col-md-8 offset-md-1">
        @if (count($blogPosts)) @foreach ($blogPosts as $blogPost)
        <?php //var_dump($blogPost->comments) ?>
    @include('components.blog.blog') @endforeach @endif
    </div>
</section>
@endsection
 {{-- <i class="far fa-thumbs-down" aria-hidden="true"></i>
<i class="far fa-star" aria-hidden="true"></i> --}}
