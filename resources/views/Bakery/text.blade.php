
<script>
    var _csrf = '{{ csrf_token() }}';
    $('#btn-comment').click(function(ev) {
        ev.preventDefault();
        let content = $('#comment-content').val();
        let _commentUrl = "{{ route('comment_ajax', $detail_product->id) }}";
        $.ajax({
            url: _commentUrl,
            type: "GET",
            data: {
                content: content,
                _token: _csrf
            },
            success: function(res) {
                if (res) {
                    $('#content-comment').html(res);
                    setTimeout(() => {

                        location.reload();
                    }, 1000);
                }
            }
        });
    })
</script>
