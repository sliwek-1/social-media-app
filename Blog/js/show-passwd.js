let checkbox = document.querySelector('#show-passwd');
let inputPass = document.querySelectorAll('.input-pass');

checkbox.addEventListener('click',() => {
    if(checkbox.checked == true){
        inputPass.forEach(input =>{
            input.type = 'text';
        })
    }else{
        inputPass.forEach(input =>{
            input.type = 'password';
        })
    }
})