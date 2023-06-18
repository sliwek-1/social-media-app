async function renderChat(){
    try{
        let userChatID = document.querySelector('.user-chat-id').value;
        let chat = document.querySelector('.chat-center');
        let req = await fetch('php/render-chat.php',{
            method: 'post',
            body: "userID=" + userChatID,
            headers: {
                'Content-type': "application/x-www-form-urlencoded",
            }
        })
        let res = await req.text();
        
        chat.innerHTML = res;
    }catch(error){
        console.log(error);
    }
}
