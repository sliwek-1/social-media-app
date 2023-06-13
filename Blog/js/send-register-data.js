let form = document.querySelector('.login-form');
let loginBtn = document.querySelector('.login-btn');
let error = document.querySelector('.error');

async function fetchData(){
    try{
        let formData = new FormData(form)

        let response = await fetch('./php/signup.php',{
            method: 'post',
            body: formData,
        })

        let data = await response.text();
        
        if(data == "success"){
            location.href = "main.php";
        }else{
            error.textContent = data;
            error.classList.add('active');
        }

    }catch(error){
        console.log(error)
    }   
}

loginBtn.addEventListener('click', (e) => {
    e.preventDefault()
    fetchData()
    .catch(error => {
        console.log(error)
    })
})

