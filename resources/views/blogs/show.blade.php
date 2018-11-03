@extends('layouts.app')
@section('content')
<section id="blogSection" class="row">
    <div class="col-md-3 d-none d-md-flex">
    @include('inc.sidebar')
    </div>
    <div class="col-12 col-md-8 offset-md-1">
        @if (count($blogPost))
        <?php //var_dump($blogPost->comments) ?>
    @include('components.blog.blog') @endif
    </div>
</section>
@endsection
