function commentsAjax() {
    var csrfToken = $('meta[name="csrf-token"]').attr("content");
    var product_id = $('#p_id').val();
    $.post('/comment/show?product_id='+product_id, { _csrf : csrfToken }, function(data) {

        $('#text-replies').empty();
        $('#text-replies').append(data);
        $('.update_comment').click(showTextForm);
        $('.cancel_upd').click(hideTextForm);
        $('.confirm_update').click(updateCommentAjax);
        $('.delete_comment').click(deleteCommentAjax);

    });
    //$.ajax({
    //    url : '/comment/show?id='+id,
    //    type : 'POST',
    //    data : { _csrf : csrfToken },
    //    success : function(data) {
    //
    //        $('#text-replies').append(data);
    //
    //    },
    //    error : console.log('error')
    //
    //});
}

function updateCommentAjax(){
    if(confirm('Update this comment?')){
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var comment_id = $(this).parent().siblings('.comment_id').val();
        var new_text = $(this).siblings('.form-control').val();
        $.post('/comment/update?comment_id='+comment_id, { _csrf : csrfToken, new_text : new_text}, function(data) {

            console.log(data);
            commentsAjax();

        });
    }
}

function showTextForm(){
    $(this).hide();
    $(this).siblings('.commentText').hide();
    $(this).siblings('#input').show();
}

function hideTextForm() {
    $(this).parent().hide();
    $(this).parent().siblings('.update_comment').show();
    $(this).parent().siblings('.commentText').show();
}

function deleteCommentAjax(){
    if(confirm('Sure you want to delete this comment?')){
        var csrfToken = $('meta[name="csrf-token"]').attr("content");
        var comment_id = $(this).siblings('.comment_id').val();
        $.post('/comment/delete?comment_id='+comment_id, { _csrf : csrfToken }, function() {

            commentsAjax();

        });
    }
}

commentsAjax();

