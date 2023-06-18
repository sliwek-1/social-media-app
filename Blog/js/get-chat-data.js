function getChatData(){
    let userList = document.querySelectorAll('.user-list-item');

    userList.forEach(user => {
        user.addEventListener('click',async (e) => {
            try{
                let currentUserList = e.target.parentElement;
                let userID = currentUserList.querySelector('.user-list-id').value;
                let chat = document.querySelector('.chat');
                let userImg = document.querySelector('.user-chat-img');
                let userName = document.querySelector('.user-name-chat');
                let userChatID = document.querySelector('.user-chat-id');
                let closeTab = document.querySelector('.close-chat');
                
                let request = await fetch('php/get-chat-data.php',{
                    method: 'post',
                    body: 'userID=' + userID,
                    headers: {
                        'Content-type': "application/x-www-form-urlencoded",
                    }
                })
    
                let response = await request.json();
                    
                userImg.src = response.img_usr;
                if(response.img_usr == null){
                    userImg.src = 'user.jpg';
                }
                userName.textContent = `${response.firstname} ${response.surrname}`;
                userChatID.value = `${response.unique_id}`;
                
                chat.classList.add('active');

                closeTab.addEventListener('click', () => {
                    chat.classList.remove('active');
                })

            }catch(error){
                console.log(error);
            }
        })
    })
}

