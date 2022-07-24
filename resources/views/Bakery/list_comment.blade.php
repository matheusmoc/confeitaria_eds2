<div class="image-member ">
    <img src="{{ asset('asset/img/Image/user.png') }}" width="70px" height="70px">
</div>
<div class="content-detail-comment">
    <div class="rate-star">
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
        <i class="fa fa-star" aria-hidden="true"></i>
    </div>
    <span> <small class="text-muted">{{ $comment->created_at }}</small></span>
    <p class="name-member">{{ $comment->content }}</p>
    <a href="#" onclick="">Apagar</a>
</div>
