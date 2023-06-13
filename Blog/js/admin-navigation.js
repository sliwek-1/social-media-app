let btns = document.querySelectorAll('.list-item');
let sections = document.querySelectorAll('.section');


btns.forEach(btn => {
    btn.addEventListener('click', (e) => {
        let btnID = e.target.dataset.id;
        let currentBtn = e.target;
        sections.forEach(section => {
            let sectionID = section.dataset.id;
            if(btnID === sectionID){
                let sec = document.querySelector(`.${sectionID}`);
                if(!sec.classList.contains('active')){
                    sections.forEach(s => {
                        s.classList.remove('active');
                    })
                    btns.forEach(b => {
                        b.classList.remove('active');
                    })
                    currentBtn.classList.add('active');
                    sec.classList.add('active');
                }
            }
        })
        //console.log(btnID)
    })
})