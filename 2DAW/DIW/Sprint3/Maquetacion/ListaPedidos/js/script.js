document.addEventListener('DOMContentLoaded', function(){
    let burguer = document.getElementById('hamburguesa');
    let aside = document.querySelector('aside');

    burguer.addEventListener('click', (event)=>{
            aside.classList.toggle('visible');
    })
});