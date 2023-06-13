let form = document.querySelector('.login-form');
let loginBtn = document.querySelector('.login-btn');
let errorContainer = document.querySelector('.error');

async function loginData(){
    try{
        let formData = new FormData(form);

        let response = await fetch('./php/login.php',{
            method: 'post',
            body: formData,
        })

        let data = await response.text();

        if(data == "success"){
            location.href = "main.php";
            console.log(data)
        }else{
            errorContainer.textContent = data;
            errorContainer.classList.add('active');
        }

    }catch(error){
        console.log(error);
    }
}


loginBtn.addEventListener('click', (e) => {
    e.preventDefault();

    loginData()
    .catch(error => {
        console.log(error);
    })
})