
async function showReactions(){
    try{
        let posts = document.querySelectorAll('.wpis');
        let request = await fetch('php/get-reactions.php');

        let response = await request.json();
        posts.forEach(post => {
            let postID = post.querySelector('.post-id').value;
            let like = post.querySelector('.count-like');
            let dislike = post.querySelector('.count-dislike');

            response.forEach(res => {
                res.forEach(r => {
                    if(r.post_id == postID){
                        like.textContent = r.likes;
                        dislike.textContent = r.dislikes;
                    }
                })
            })
            colorReaction();
            //console.log(response)
        })
    }catch(error){
        console.log(error)
    }
}


async function colorReaction(){
    try{
        let request = await fetch('php/show-reactions.php');
        let response = await request.json();
        let userID = document.querySelector('.user-id').value;
        let posts = document.querySelectorAll('.wpis');
        response.forEach(res => {
            if(res.user_id == userID){
                switch(res.type_reaction){
                    case 'like':
                        getReactionToColor(posts, res, 'like', 'dislike');
                    break;
                    case 'dislike':
                        getReactionToColor(posts, res, 'dislike', 'like');
                    break;
                }
            }
        })
    }catch(error){
        console.log(error);
    }
}


function getReactionToColor(posts, res, reactionA, reactionB){
    posts.forEach(post => {
        let postID = post.querySelector('.post-id').value;
        if(postID == res.post_id){
            let likeBtn = post.querySelector(`.${reactionA}`);
            likeBtn.style.color = 'royalblue';

            let dislikeBtn = post.querySelector(`.${reactionB}`);
            dislikeBtn.style.color = 'black';
        }
    })
}
