function getChatData(){
    let userList = document.querySelectorAll('.user-list-item');

    userList.forEach(user => {
        user.addEventListener('click', (e) => {
            let currentUserList = e.target.parentElement;
            let userID = currentUserList.querySelector('.user-list-id').value;
            sendChatData(userID);
        })
    })
}


async function sendChatData(userID){
    try{
        let request = await fetch('php/get-chat-data.php',{
            method: 'post',
            body: 'userID=' + userID,
            headers: {
                'Content-type': "application/x-www-form-urlencoded",
            }
        })

        let response = await request.text();
        console.log(response)
    }catch(error){
        console.log(error)
    }
}