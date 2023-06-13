let searchBar = document.querySelector('.search');
let userList = document.querySelector('.user-list');


searchBar.addEventListener('keyup', async (e) => {
    let search = searchBar.value;
    try{
        let request = await fetch('php/search.php',{
            method: 'post',
            body: 'searchTerm=' + search,
            headers: {
                'Content-type': "application/x-www-form-urlencoded",
            }
        })
    
        let response = await request.text();
        userList.innerHTML = response;
    }catch(error){
        console.log(error)
    }
})

searchBar.addEventListener('focus', () => {
    userList.classList.add('active');
})

userList.addEventListener('click', () => {
    userList.classList.remove('active');
})


