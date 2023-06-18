async function sendMessage(){
    try{
        let btn = document.querySelector('.submit-message');
        btn.addEventListener('click',async (e) => {
            e.preventDefault();
            let form = document.querySelector('.send-message');
            let formData = new FormData(form);
            let request = await fetch('php/get-messages.php',{
                method: 'post',
                body: formData
            });
            
            let response = await request.text();
            
            renderChat();
        })
    }catch(error){
        console.log(error)
    }
}


async function renderChat(){
    try{
        let userChatID = document.querySelector('.user-chat-id');
        let request = await fetch('php/render-chat.php',{
            method: 'post',
            body: "userID=" + userChatID.value
        })
        let response = await request.text();
        console.log(response)
    }catch(error){
        console.log(error);
    }
}
