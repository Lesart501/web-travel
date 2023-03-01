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