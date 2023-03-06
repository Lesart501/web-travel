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

var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6405de8431ebfa0fe7f0f2ef/1gqreqe28';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
})();