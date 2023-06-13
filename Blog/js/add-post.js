let form = document.querySelector('.add-post-form');
let btn = document.querySelector('.submit');


let postElement = document.querySelector('.post-section');

async function getData(){
    try{
        let info = "";

        await fetch('php/get-posts.php')
        .then(response => response.text())
        .then(data => info = data);
        
        postElement.innerHTML = info;
        
    }catch(error){
        console.log(error)
    }
}

getData();

async function addPost(){
    try{
        let dataForm = new FormData(form);
    
        let response = await fetch('php/add-post.php',{
            method: 'post',
            body: dataForm
        })
        let data = await response.text();
        //console.log(data)
    }catch(error){
        console.log(error)
    }
}


btn.addEventListener('click', (e) => {
    e.preventDefault();
    getData();
    addPost();
})