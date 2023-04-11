function filter(){
    let restType = $('input[name="restType"]:checked').val();
    let accomodation = $('input[name="accomodation"]:checked').val();
    let meal = $('input[name="meal"]:checked').val();
    let min_price = $('#min_price').val();
    let max_price = $('#max_price').val();
    let oper = $('input[name="oper"]:checked').val();

    $.ajax({
        url: '/filter',
        type: 'get',
        data:{
            restType: restType,
            accomodation: accomodation,
            meal: meal,
            min_price: min_price,
            max_price: max_price,
            oper: oper
        },
        success: function(response){
            $('#tours').html(response);
        }
    })
}


$('input[name="restType"]').on('change', filter)
$('input[name="accomodation"]').on('change', filter)
$('input[name="meal"]').on('change', filter)
$('input[name="min_price"]').on('change', filter)
$('input[name="max_price"]').on('change', filter)
$('input[name="oper"]').on('change', filter)
