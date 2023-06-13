async function main(){
    try{
        let reactions = document.querySelectorAll('.btn-react');
        reactions.forEach(react => {
            react.addEventListener('click', async (e) => {
                let reaction = e.target.parentElement.dataset.id;
                let currentPost = e.target.parentElement.parentElement.parentElement;
                let postID = currentPost.querySelector('.post-id').value;
                let userID = currentPost.querySelector('.user-post-id').value;

                let data = {
                    reaction: reaction,
                    postID: postID,
                    userID: userID
                }

                let formData = new FormData()

                formData.append('reaction',data.reaction)
                formData.append('postID',data.postID)
                formData.append('userID',data.userID)

                let request = await fetch('php/reaction.php',{
                    method: 'post',
                    body: formData
                })
                showReactions(); // show-reaction.js
            })
        })
    }catch(error){
        console.log(error)
    }
} 

