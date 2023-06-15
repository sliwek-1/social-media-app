async function sendMessage(){
    let btn = document.querySelector('.submit-message');
    try{
        btn.addEventListener('click',async (e) => {
            e.preventDefault();
            let form = document.querySelector('.send-message');
            let formData = new FormData(form);
            let request = await fetch('/php/send-message.php',{
                method: 'post',
                body: formData
            });
            
            let response = await request.text();
            
            console.log(response);
        })
    }catch(error){
        console.log(error)
    }
}

sendMessage();