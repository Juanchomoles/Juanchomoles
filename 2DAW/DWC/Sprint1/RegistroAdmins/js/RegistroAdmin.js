document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("registroForm");
    const fields = ['nombre', 'apellido', 'correo', 'password', 'confirmPass'];
    let button = document.getElementById("cookie");
    let mostrar = document.getElementById("mostrar");
    let mostrarT = document.getElementById("mostrarT");

    button.addEventListener("click", (event) => {
        document.cookie = "prueba=HolaMundo"
        document.cookie = "prueba2=AdiosMundo"
        document.cookie = "prueba3=Naranja"
    });
    
    mostrar.addEventListener("click", (event) => {
        let ul = document.getElementById("ul");
        let li = document.createElement("li");
        let cookies = document.cookie.replace(/(?:(?:^|.*;\s*)prueba2\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        ul.append(li);
        li.append(cookies);
    });

    mostrarT.addEventListener("click", (event) => {
        let ul = document.getElementById("ul");
        let li = document.createElement("li");
        let cookies = document.cookie;
        ul.append(li);
        li.append(cookies);
    });

    fields.forEach(field => {
        const inputField = document.getElementById(field);
        const errorField = document.getElementById(field + 'Error');
        inputField.addEventListener("input", function () {
            validateField(field, inputField.value, errorField, inputField);
        });
    });

    form.addEventListener("submit", function (e) {
        
        if (validateForm()) {
                const nombre = document.getElementById("nombre").value;
                const apellido = document.getElementById("apellido").value;
                const correo = document.getElementById("correo").value;
                const password = document.getElementById("password").value;

                localStorage.setItem("Nombre",nombre);
                localStorage.setItem("Apellido",apellido);
                localStorage.setItem("Correo",correo);
                localStorage.setItem("Contraseña",password);
                console.log("Nombre: " + localStorage.getItem("Nombre"))
                console.log("Apellido: " + localStorage.getItem("Apellido"))
                console.log("Correo: " + localStorage.getItem("Correo"))
        } else {
            alert("El formulario tiene errores. Por favor, corrígelos antes de enviarlo.");ç
            e.preventDefault();
        }
    });

    function validateField(fieldname, value, errorField, inputField) {
        errorField.textContent = '';
        inputField.classList.remove('error');

        switch (fieldname) {
            case 'nombre':
            case 'apellido':
                if (value.length < 1) {
                    errorField.textContent = "El " + fieldname + " no puede estar vacio";
                    inputField.classList.add('error');
                }
                else if (!value.match(/^[A-Za-z]+$/)) {
                    errorField.textContent = "Debe contener solo letras.";
                    inputField.classList.add('error');
                }
                break;
            case 'correo':
                if (!value.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)) {
                    errorField.textContent = "Correo electrónico no válido.";
                    inputField.classList.add('error');
                }
                break;
            case 'password':
                if (!value.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/)) {
                    errorField.textContent = "Debe contener al menos una minúscula, una mayúscula, un carácter especial y un número.";
                    inputField.classList.add('error');
                }
                break;
            case 'confirmPass':
                const passwordValue = document.getElementById('password').value;
                if (value !== passwordValue) {
                    errorField.textContent = "Las contraseñas no coinciden.";
                    inputField.classList.add('error');localStorage.getItem(nombre[0])
                }
                break;
            default:
                break;
        }
    }

    function validateForm() {
        const fields = ['nombre', 'apellido','correo', 'password', 'confirmPass'];
        let isValid = true;

        fields.forEach(field => {
            const inputField = document.getElementById(field);
            const errorField = document.getElementById(field + 'Error');
            validateField(field, inputField.value, errorField, inputField);
            if (errorField.textContent !== '') {
                isValid = false;
            }
        });
        return isValid;
    }
});