let out_date_input = document.getElementById('out_date');
let return_date_input = document.getElementById('return_date');
let nights = document.getElementById('nights').value;
out_date_input.addEventListener('change', function(e){
    return_date_input.value = null;
    let out_date = this.value;
    console.log(out_date);
    console.log(nights);
    out_date = new Date(out_date);
    let return_date = new Date();
    console.log(out_date);
    return_date.setDate(out_date.getDate() + parseInt(nights));
    return_date_input.valueAsDate = return_date;
    console.log(out_date);
    console.log(return_date);
    e.preventDefault();
})

return_date_input.addEventListener('change', function(e){
    out_date_input.value = null;
    let return_date = this.value;
    return_date = new Date(return_date);
    let out_date = new Date();
    out_date.setDate(return_date.getDate() - parseInt(nights));
    out_date_input.valueAsDate = out_date;
    e.preventDefault();
})

let phoneMask = IMask(
    document.getElementById('phone-mask'), {
        mask: '+{7}(000)000-00-00'
});