document.addEventListener('DOMContentLoaded', (event) => {
    const myform = document.getElementById("form")
    let name = document.getElementById("nombre");
    let lastName = document.getElementById("apellido");
    let address = document.getElementById("domicilio");
    let email = document.getElementById("email");
    let password = document.getElementById("contraseña");
    let confirmPass = document.getElementById("confirmPass");
    let phone = document.getElementById("phone");
    let dni = document.getElementById("dni");
    let rs = document.getElementById("rs");
    const campos = document.querySelectorAll(".section");
    const popup = document.getElementById("myPopup");
    const modal = document.getElementById("modal");
    const accept = document.getElementById("accept");
    const decline = document.getElementById("decline");
    const clickD = document.getElementById("cd");
    const reseteo = document.getElementById("formReset");
    const enviar = document.getElementById("enviar");
    let valids = new Array();

    enviar.addEventListener('click', function(){
        let stringValid = "";
        for(var key1 in valids){
            if(valids[key1] == false){  
                stringValid += key1+ " | ";
            }
        } 
        for(var key in valids){
            if(valids[key] == false){
                event.preventDefault();
                Swal.fire({    
                    text: "Los siguientes campos, contienen Errores: " + stringValid,
                    icon: 'error',
                    confirmButtonText: 'Aceptar'
                });
            }
            else{
                console.log("bien")
            }
        }    
    });
    
    name.addEventListener('input', (event) => {
        valids["nombre"] = validInput(name);
    });

    lastName.addEventListener('input', (event) => {
        valids["apellido"] = validInput(lastName);
    });

    address.addEventListener('input', (event) => {
        valids["direccion"] = validInput(address);
    });

    email.addEventListener('input', (event) => {
        valids["email"] = validInput(email);
    });

    password.addEventListener('input', (event) => {
        valids["contraseña"] = validInput(password);
    });

    confirmPass.addEventListener('input', (event) => {
        valids["confirmarContraseña"] = validConfirmPass();
    });

    dni.addEventListener('input', (event) => {
        valids["DNI"] = validDNI();
    });

    phone.addEventListener('input', (event) => {
        valids["telefono"] = validInput(phone);
    });

    rs.addEventListener('input', (event) => {
        valids["razonSocial"] = validInput(rs);
    });

    campos.forEach(text => {
        text.addEventListener('mousemove', () => {
            text.classList.add('hovered');
        });
    
        text.addEventListener('mouseout', () => {
            text.classList.remove('hovered');
        });
    });

    clickD.addEventListener('contextmenu', (event) => {
        event.preventDefault();
        popup.classList.add('show');
    });

    clickD.addEventListener('dblclick', (event) => {
        event.preventDefault();
       alert("Se supone que debias dar click derecho..."); 
    });

    reseteo.addEventListener('click', (event) => {
        modal.classList.add('show');
        event.preventDefault();
    });

    accept.addEventListener('click', (event)=>{
        modal.classList.remove('show');
        myform.reset();
    });

    decline.addEventListener('click', (event)=>{
        modal.classList.remove('show');
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' || event.key === 'Esc') 
        popup.classList.remove('show');
    });

    function validInput(data) {
        if (data.validity.patternMismatch || data.value === "") {
            data.classList.remove('valid');
            data.classList.add('invalid');
            return false;
        }
        else {
            data.classList.remove('invalid');
            data.classList.add('valid');
            return true;
        }
    }

    function validConfirmPass() {
        if (confirmPass.value != password.value) {
            confirmPass.classList.remove('valid');
            confirmPass.classList.add('invalid');
            return false;
        }
        else {
            confirmPass.classList.remove('invalid');
            confirmPass.classList.add('valid');
            return true;
        }
    }

    function validDNI() {
        let dniLetters = ["T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X",
            "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E"];

        let dniN = dni.value.substr(0, 8);
        let dniL = dni.value.substr(8, 9);

        let residuo = dniN % 23
        dniKey = dniLetters[residuo];

        if (dniL == dniKey){
            dni.classList.remove('invalid');
            dni.classList.add('valid');
            return true;
        }
        else {
            dni.classList.remove('valid');
            dni.classList.add('invalid');
            return false;
        }
    }
});