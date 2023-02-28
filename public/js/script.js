// $(document).ready(function(){
//     $('#search').on('click', function(){
//         let country = $('#country').val();
//         let people = $('#people').val();
//         let nights = $('#nights').val();
//         console.log(country + ' ' + people + ' ' + nights);
//         $.ajax({
//             type: 'get',
//             url: '/filter',
//             data: {
//                 countries_id: country,
//                 people: people,
//                 nights: nights
//             },
//             success: function(data){
//                 $('#tours').html(data);
//             }
//         })
//     })
// })

let filter_form = document.getElementById("filter_form");
let tours = document.getElementById("tours");

filter_form.addEventListener("submit", (e)=>{
    let filter_data = new FormData(filter_form);
    e.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/filter");
    xhr.send(filter_data);
    xhr.onreadystatechange = function(){
        if(xhr.readyState === 4 && xhr.status === 200){
            let output = xhr.response;
            tours.innerHTML = output;
        }
    }
})