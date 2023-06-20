let loadMore = document.querySelector('.load-more')
let reactBtn = document.querySelectorAll('.btn-react');
let pageNum = 1;

const observer = new IntersectionObserver(entries => {
    entries.forEach(entry =>{
        if(entry.isIntersecting){
            fetchData(pageNum);
            pageNum++;            
        }
    })
})

loadMore.addEventListener('click', () => {
    pageNum = 1;
    fetchData(pageNum);
})

observer.observe(loadMore);
 
async function fetchData(pageNum){
    try{    
        let request = await fetch('php/load-main.php',{
            method: 'post',
            body: 'page=' + pageNum,
            headers: {
                'Content-type': "application/x-www-form-urlencoded",
            }
        })
        .then(response => response.json())
        .then(data => {
            data.forEach(card => {
                generateCards(card);
            })
            getChatData() // get-chat-data.js
            showReactions(); // show-reactions.js
            main(); //get-reaction-data.js

        })
        .catch(error => console.log(error))

    }catch(error){
        console.log(error);
    }
}

function generateCards(card){
    let main = document.querySelector('.post-center')
    let element = document.createElement('article');
    let content = `
        <div class="user-section">
            <img src="${card.img_usr}" class="user-post-img">
            <div class="post-user-name">${card.firstname} ${card.surrname}</div>
            <input type="text" value="${card.unique_id}" class="post-id" hidden>
            <input type="text" value="${card.user_id}" class="user-post-id" hidden>
        </div>
        <div class="title-card">${card.title}</div>
        <div class="img-card">
            <img src="./img/${card.img}" alt="image">
        </div>
        <div class="reaction">
            <div class="react like btn-react" data-id="like"><i class="fa fa-thumbs-up" aria-hidden="true"></i><span class="count-like"></span></div>
            <div class="react dislike btn-react" data-id="dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i><span class="count-dislike"></span></div>
            <div class="react comment"><i class="fa fa-commenting" aria-hidden="true"></i> <span class="text">comment</span></div>
        </div>`;
    element.classList.add('wpis');
    element.innerHTML = content;
    main.insertBefore(element, loadMore);
}

function refreshReactions(){
    let reactBtn = document.querySelectorAll('.btn-react');

    reactBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            showReactions();
        })
    })
}