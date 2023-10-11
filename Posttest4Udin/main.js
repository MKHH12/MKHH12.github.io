  // JavaScript untuk mengatur perubahan ukuran background navbar saat scroll
  window.addEventListener("scroll", function () {
    var navbar = document.querySelector(".navbar");
    if (window.scrollY > 0) {
      navbar.classList.add("small-navbar");
    } else {
      navbar.classList.remove("small-navbar");
    }
  });


const body = document.querySelector('body');
const btn = document.querySelector('.btn');
const icon = document.querySelector('.btn_icon')



function store(value){
    localStorage.setItem('darkmode', value);
}


function load(){
    const darkmode = localStorage.getItem('darkmode');

    // if the dark mode was never activated
    if(!darkmode){
        store(false); 
        icon.classList.add('fa-sun');   
    }
    else if( darkmode == 'true'){ // if the dark mode is activated
        body.classList.add('darkmode');
        icon.classList.add('fa-moon');
    }
    else if (darkmode == 'false'){ // if the dark mode exits but is disabled
        icon.classList.add('fa-sun');
    }
}

load();


btn.addEventListener('click', () => {

    body.classList.toggle('darkmode');
    icon.classList.add('animated');
    
    // save true or false
    store(body.classList.contains('darkmode'));

    if(body.classList.contains('darkmode')){
        icon.classList.remove('fa-sun');
        icon.classList.add('fa-moon');
    }
    else{
        icon.classList.remove('fa-moon');
        icon.classList.add('fa-sun');
    }

    setTimeout( () => {
        icon.classList.remove('animated');
    }, 400)

})
