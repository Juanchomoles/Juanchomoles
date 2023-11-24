document.addEventListener('DOMContentLoaded', function(){
    
    let burguer = document.getElementById('hamburguesa');
    let aside = document.querySelector('aside');

    burguer.addEventListener('click', (event)=>{
            aside.classList.toggle('visible');
    });
});
function openMenuModal() {
    var menuModal = document.getElementById('menu-modal');
    menuModal.style.display = 'block';
}

function closeMenuModal() {
    var menuModal = document.getElementById('menu-modal');
    menuModal.style.display = 'none';

    var administrationMenu = document.getElementById('administration-menu');
    administrationMenu.style.display = 'none'; // Ocultar el menú de administración
    console.log('Hola');
}

// Agregar un controlador de eventos al icono de usuario
var usuarioIcon = document.getElementById('usuari');
usuarioIcon.addEventListener('click', openMenuModal);

// Modificar el controlador de eventos para el botón de administración
var administrationMenuBtn = document.getElementById('administration-menu-btn');
administrationMenuBtn.addEventListener('click', function (event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
    var administrationMenu = document.getElementById('administration-menu');

    if (administrationMenu.style.display === 'block') {
        administrationMenu.style.display = 'none';
    } else {
        administrationMenu.style.display = 'block';
    }
});


