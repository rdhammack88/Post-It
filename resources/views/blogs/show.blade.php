@extends('layouts.app')
@section('content')
<section id="blogSection" class="row">
    <div class="col-md-3 d-none d-md-flex">
    @include('inc.sidebar')
    </div>
    <div class="col-12 col-md-8 offset-md-1">
        @if (count($blogPost))
        <?php //var_dump($blogPost->comments) ?>

        <div class="blog">
            <article>
                <div class="p-3 blog_title">
                    <div class="row">
                        <div class="col-8">
                            <a href="/blogs/user/{{$blogPost->user->id}}" class="avatar">
                                <img src='../storage/user_profile_images/{{$blogPost->user->avatar}}' alt="User dhammacks profile photo" />
                            </a>
                            <a href="/blogs/user/{{$blogPost->user->id}}" class="name">
                                <h5 class="user_name">{{$blogPost->user->username}}</h5>
                            </a>
                        </div>
                        <div class="col-4 text-right date">
                            <p>
                                <a href="/blogs/date/{{$blogPost->updated_at}}" class="date_posted">
                                    {{date('M d, Y', time($blogPost->updated_at))}}
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row blogPost">
                    <h3 class="col-12 title">
                        <a href="/blogs/{{$blogPost->id}}" class="title">{{$blogPost->title}}</a>
                    </h3>
                    <p class="col-12 post">{{$blogPost->body}}</p>
                    <div class="col-12 text-right likes-and-comments">
                        <p class="col-12 m-0">
                            <span><span class="total-likes">{{$blogPost->likes}}</span> Likes &nbsp;&nbsp;&nbsp;</span>
                            <span><span class="total-dislikes">{{$blogPost->dislikes}}</span> Dislikes &nbsp;&nbsp;&nbsp;</span>
                            <span class="comment-btn">
                                <span class="total-comments">{{$blogPost->comments}}</span> Comments
                            </span>
                        </p>
                    </div>
                </div>
                <div class="col-12 blog-footer-row">
                    <form class="blog_footer" action="./includes/ajax.php" method="POST">
                        <p class="">
                            <span class="sr-only">Like this blog</span>
                            <button type="submit" class="btn like-btn" name="like" title="" data-toggle="tooltip" data-placement="top" data-original-title="Like this post">
                            <span class="fa fa-heart-o" aria-hidden="true"></span>
                            Like
                        </button>
                            <span class="sr-only">Dislike this blog</span>
                            <button type="submit" class="btn dislike-btn" name="dislike" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Disike this post">
                            <span class="fa fa-thumbs-o-down" aria-hidden="true"></span>
                            Dislike
                        </button>
                            <span class="sr-only">
                            Favorite this blog
                        </span>
                            <button type="submit" class="btn favorite-btn" name="favorite" title="" data-toggle="tooltip" data-placement="top" data-original-title="Favorite this post">
                            <span class="fa fa-star-o" aria-hidden="true"></span>
                            Favorite
                        </button>
                            <button type="submit" class="comment-btn btn" name="comment" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Comment on this post">
                            <span class="fa fa-comment" aria-hidden="true"></span>
                            Comment
                        </button>
                        </p>
                        <input type="number" defaultValue="56" name="blog_id" class="d-none blog_id" />
                        <input type="text" defaultValue="test" class="d-none blog_category" />
                    </form>
                </div>
            </article>
            {{--
            <Comment /> --}}
        </div>
        @endif
    </div>
</section>
@endsection
