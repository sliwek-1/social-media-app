
async function getUserListData(){
    try{
        let request = await fetch('php/get-user-list.php'); 
        let response = await request.json();
        
        response.forEach(res => {
            let usersList = document.querySelector('.users-list');
            let element = document.createElement('article');
            let content = `
            <input type="text" value="${res.unique_id}" class="user-list-id" hidden>
            <div class="user-list-img">
                <img class="user-img-list" src="./img/${res.img_usr}" alt="#">
            </div>
            <div class="user-list-name">${res.firstname} ${res.surrname}</div>
            <div class="user-status">${res.status}</div>`;
            element.innerHTML = content;
            element.classList.add('user-list-item');
            usersList.append(element);
            let userStatus = element.querySelector('.user-status'); 
            let userImg = element.querySelector('.user-img-list');

            switch(res.status){
                case 'online':
                    userStatus.innerHTML = '<i class="fa fa-circle" aria-hidden="true"></i>';
                    userStatus.style.color = 'green'; 
                break;
                case 'offline':
                    userStatus.innerHTML = '<i class="fa fa-circle" aria-hidden="true"></i>';
                    userStatus.style.color = 'red'; 
                break;
            }

            if(res.img_usr == null){
                userImg.src = "./user.jpg";
            }
            
        })
    }catch(error){
        console.log(error);
    }
}

getUserListData();