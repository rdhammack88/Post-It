@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <h1 class="my-3 mb-5 mx-auto">Create new blog</h1>
    <span class="mx-auto">
        <a href="/dashboard" class="btn btn-secondary btn-outline-secondary btn-sm">Go Back</a>
    </span>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        {!! Form::open(['action' => 'BlogPostController@store', 'method' => 'POST']) !!} {{ Form::bsText('title', '', ['placeholder'
        => 'Blog title']) }} {{ Form::bsText('tags', '', ['placeholder' => 'Blog tags. (Seperate by commas)']) }} {{ Form::bsTextArea('blog',
        '', ['id' => 'article-ckeditor', 'placeholder' => 'Start writing your blog post here...']) }} {{ Form::bsSubmit('Submit',
        ['class' => 'btn btn-primary']) }} {!! Form::close() !!}
    </div>
</div>
@endsection
