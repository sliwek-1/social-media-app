window.addEventListener('DOMContentLoaded', () => {

    function editData(){
        let editBtns = document.querySelectorAll('.edit-btn');
        let closeBtn = document.querySelector('.close-edit');
        let editArea = document.querySelector('.edit-area');
        let editForm = document.querySelector('.edit-form');
        let modal = document.querySelector('.modal');

        editBtns.forEach(btn => {
            btn.addEventListener('click', async (e) => {
                console.log(e.target)
                e.preventDefault();
                let currentElement = e.target.parentElement.parentElement.parentElement;
                let post = currentElement.querySelector('.post');
                let formData = new FormData(post);
                let request = await fetch('php/edit-post.php', {
                    method: 'post',
                    body: formData
                })
                let data = await request.text();

                editForm.innerHTML = data;
                editArea.classList.add('active');
                modal.classList.add('active');
                submitData();
            })
        })

        closeBtn.addEventListener('click', () =>{
            editArea.classList.remove('active');
            modal.classList.remove('active');
        })
    }

    function submitData(){
        let submitBtn = document.querySelector('.save-edit');
        let editForm = document.querySelector('.edit');

        submitBtn.addEventListener('click', async (e) => {
            e.preventDefault();
            try{
                let formData = new FormData(editForm);
                let request = await fetch('php/submit-edit.php', {
                    method: 'post',
                    body: formData
                })

                let data = await request.text();
                console.log(data)
                if(data == "success"){
                    let editArea = document.querySelector('.edit-area');
                    let modal = document.querySelector('.modal');
                    editArea.classList.remove('active');
                    modal.classList.remove('active');
                    getData();
                }
            }catch(error){
                console.log(error);
            }
        })
    }
    editData();
})

