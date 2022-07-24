<div class="image-member ">
    <img src="{{ asset('asset/img/Image/user.png') }}" width="90px" height="80px">
</div>
<div class="content-detail-comment">
    <span>{{ $comment->user->name }} <small class="text-muted">{{ $comment->created_at }}</small></span>
    <p class="name-member">{{ $comment->content }}</p>
</div>