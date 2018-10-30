@extends('layouts.app')
@section('content')
<section id="blogSection" class="row">
    <div class="col-md-3 d-none d-md-flex">
    @include('inc.sidebar')
    </div>
    <div class="col-12 col-md-8 offset-md-1">
        @if (count($blogPosts)) @foreach ($blogPosts as $blogPost)
        <?php //var_dump($blogPost->comments) ?>

        <div class="blog">
            <article>
                <div class="blog_title">
                    <div class="row">
                        <div class="col-8">
                            <a href="/blogs/user/{{$blogPost->user->id}}" class="avatar ">
                                <img src='storage/user_profile_images/{{$blogPost->user->avatar}}' alt="User dhammacks profile photo" />
                            {{-- </a>
                            <a href="/blogs/user/{{$blogPost->user->id}}" class="name"> --}}
                                <h4 class="">{{$blogPost->user->username}}</h4>
                            </a>
                        </div>
                        <div class="date col-4 text-right">
                            <a href="index.php?date=01/16/2018" class="date">
                                <p class="date_posted">{{date('M d, Y', time($blogPost->updated_at))}}</p>
                                {{-- 01/16/2018 --}}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row blogPost">
                    <a href="index.php" class="title">
                        <h3 class="title col-12">{{$blogPost->title}}</h3>
                    </a>
                    <p class="post col-12">{{$blogPost->body}}</p>
                    <div class="likes-and-comments">
                        <p class="text-right col-10 likes-and-comments">
                            <span class="total-likes">{{$blogPost->likes}}</span> Likes &nbsp;&nbsp;&nbsp;
                            <span class="total-dislikes">{{$blogPost->dislikes}}</span> Dislikes &nbsp;&nbsp;&nbsp;
                            <span class="comment-btn">
                        <span class="total-comments">{{$blogPost->comments}}</span> Comments
                            </span>
                        </p>
                    </div>
                </div>
                <div class="blog-footer-row">
                    <div class="row">
                        <form class="blog_footer" action="./includes/ajax.php" method="POST">
                            <p class="col-12">
                                <span class="sr-only">Like this blog</span>
                                <button type="submit" class="btn like-btn" name="like" title="" data-toggle="tooltip" data-placement="top" data-original-title="Like this post">
                            <span class="glyphicon glyphicon-heart-empty" aria-hidden="true"></span>
                            Like
                        </button>
                                <span class="sr-only">Dislike this blog</span>
                                <button type="submit" class="btn dislike-btn" name="dislike" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Disike this post">
                            <span class="glyphicon glyphicon-thumbs-down" aria-hidden="true"></span>
                            Dislike
                        </button>
                                <span class="sr-only">
                            Favorite this blog
                        </span>
                                <button type="submit" class="btn favorite-btn" name="favorite" title="" data-toggle="tooltip" data-placement="top" data-original-title="Favorite this post">
                            <span class="glyphicon glyphicon-star-empty" aria-hidden="true"></span>
                            Favorite
                        </button>
                                <button type="submit" class="comment-btn btn" name="comment" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Comment on this post">
                            <span class="glyphicon glyphicon-comment" aria-hidden="true"></span>
                            Comment
                        </button>
                            </p>
                            <input type="number" defaultValue="56" name="blog_id" class="d-none blog_id" />
                            <input type="text" defaultValue="test" class="d-none blog_category" />
                        </form>
                    </div>
                </div>
            </article>
            {{--
            <Comment /> --}}
        </div>

        @endforeach @endif
    </div>
</section>
@endsection
