window.addEventListener('DOMContentLoaded', () => {
    let profileBtn = document.querySelector('.profile-btn');
    profileBtn.addEventListener('click', async (e) => {
        try{
            e.preventDefault();
            let userID = document.querySelector('.user-id').value;
            let request = await fetch('php/profile.php',{
                method: 'post',
                body: 'userID=' + userID,
                headers: {
                    'Content-type': "application/x-www-form-urlencoded",
                }
            })

            let response = await request.json();
            location.href = "profile.php";
            renderData(response);
        }catch(error){
            console.log(error);
        }
    })
})


function renderData(data){
    data.forEach(row => {
        console.log(row);
    })
}