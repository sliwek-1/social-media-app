async function sendMessage(){
    try{
        let btn = document.querySelector('.submit-message');
        let msg = document.querySelector('.chat-msg');
        btn.addEventListener('click',async (e) => {
            e.preventDefault();
            let form = document.querySelector('.send-message');
            let formData = new FormData(form);
            let request = await fetch('php/get-messages.php',{
                method: 'post',
                body: formData
            });
            
            msg.value = "";
            
            renderChat();
        })
    }catch(error){
        console.log(error)
    }
}

sendMessage(); // send-message.js

