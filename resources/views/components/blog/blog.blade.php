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
            <div class="col-12 post">{!! $blogPost->body !!}</div>
            <div class="col-12 text-right likes-and-comments">
                <p class="col-12 m-0 p-0">
                    <span><span class="total-likes">{{$blogPost->likes}}</span> Likes &nbsp;&nbsp;&nbsp;</span>
                    <span><span class="total-dislikes">{{$blogPost->dislikes}}</span> Dislikes &nbsp;&nbsp;&nbsp;</span>
                    <span class="comment-btn">
                            <span class="total-comments">{{$blogPost->comments}}</span> Comments
                    </span>
                </p>
            </div>
        </div>
        <div class="col-12 p-0 blog-footer-row">
            <form class="row m-0 blog_footer_form" action="/blogs/update/{{$blogPost->id}}" method="POST">
                <p class="col-9 p-0">
                    <span class="sr-only">Like this blog</span>
                    <button type="submit" class="btn like-btn" name="like" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Like this post">
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
                    <button type="submit" class="btn favorite-btn" name="favorite" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Favorite this post">
                        <span class="fa fa-star-o" aria-hidden="true"></span>
                        Favorite
                    </button>
                    <button type="submit" class="comment-btn btn" name="comment" title="" data-toggle="tooltip" data-placement="bottom" data-original-title="Comment on this post">
                        <span class="fa fa-comment" aria-hidden="true"></span>
                        Comment
                    </button>
                </p>
                @if (auth()->id() === $blogPost->user->id)
                <p class='text-right col-3 footerSettings'>
                    <span class='sr-only'>Edit this blog</span>
                    <button type='submit' class='fa fa-pencil btn' aria-hidden='true' name='edit' title='Edit this post' data-toggle='tooltip'
                        data-placement='top'></button>
                    <span class='sr-only'>Delete this blog</span>
                    <button type='submit' class='fa fa-trash btn' aria-hidden='true' id='{{$blogPost->id}}' name='delete' title='Delete this post'
                        data-toggle='tooltip' data-placement='top'></button>
                </p>
                @endif
            </form>
        </div>
    </article>
    {{--
    <Comment /> --}}
</div>
