@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <h1 class="my-3 mb-5 mx-auto">Create new blog</h1>
    <span class="mx-auto">
        <a href="/" class="btn btn-secondary btn-outline-secondary btn-sm">Go Back</a>
    </span>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        {!! Form::open(['action' => 'BlogPostController@store', 'method' => 'POST']) !!} {{ Form::bsText('title', '', ['placeholder'
        => 'Blog title']) }} {{ Form::bsText('category', '', ['placeholder' => 'Blog tags. (Seperate by commas)']) }} {{
        Form::bsTextArea('body', '', ['id' => 'article-ckeditor', 'placeholder' => 'Start writing your blog post here...'])
        }}
        <div class="col-12">
            <label for="public" class="form-check">
                <input type="radio" name="public" id="public" value="true" />Make public
                <small class="text-danger">(Default if none selected)</small>
            </label>
            <label for="private" class="form-check">
                <input type="radio" name="public" id="private" value="false" />Make private
            </label>
        </div>
        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-success']) }} {{ Form::bsSubmit('Cancel', ['class' => 'btn btn-danger'])
        }} {!! Form::close() !!}
    </div>
</div>
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );

</script>
@endsection
