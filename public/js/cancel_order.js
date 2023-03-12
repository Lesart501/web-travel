function cancelOrder(id){
    if(confirm("Вы уверены, что хотите отменить заявку?")){
        $.ajax({
            url: 'home/' + id + '/cancel',
            type: 'delete',
            data:{
                _token: $('input[name=_token]').val()
            },
            success: function(response){
                $('#order' + id).remove()
            }
        })
    }
}
