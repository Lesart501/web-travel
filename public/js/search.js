$(document).ready(function(){
    $('#admin_search').on('keyup', function(){
        $.ajax({
            url: '/admin/search',
            type: 'get',
            data:{
                search: $(this).val()
            },
            success: function(response){
                $('#tours').html(response);
            }
        })
    });
})
