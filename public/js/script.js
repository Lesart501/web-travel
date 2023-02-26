$(document).ready(function(){
    $('#search').on('click', function(){
        let country = $('#country').val();
        let people = $('#people').val();
        let nights = $('#nights').val();
        console.log(country + ' ' + people + ' ' + nights);
        $.ajax({
            type: 'get',
            url: '/filter',
            data: {
                countries_id: country,
                people: people,
                nights: nights
            },
            success: function(data){
                $('#tours').html(data);
            }
        })
    })
})