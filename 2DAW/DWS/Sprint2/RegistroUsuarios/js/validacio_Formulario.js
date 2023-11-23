document.addEventListener("DOMContentLoaded", function () {
    let form = document.querySelector("form");
    let radioUser = document.querySelector('input[name="userType"]');
    if (radioUser) {
        document.querySelectorAll('input[name="userType"]').forEach((elem) => {
            elem.addEventListener("change", function (event) {
                let item = event.target.value;
                if (item === "PRO") {
                    addCamps("CIF","CIF");
                    addCamps("dniGerente","DNI Gerente");
                    addCamps("escrituraConstitucion","Escritura de constitucion");
                }
                else {
                    removeCamps("CIF");
                    removeCamps("dniGerente");
                    removeCamps("escrituraConstitucion");
                }
            });
        });
    }
    let autorellenarButton = document.querySelector('button[name="autoRellenar"]');
    if (autorellenarButton) {
        autorellenarButton.addEventListener("click", function (event) {
            event.preventDefault();
            autorellenarCampos();
        });
    }

    let guardarDatosButton = document.querySelector('button[name="guardarDatos"]');
    if (guardarDatosButton) {
        guardarDatosButton.addEventListener("click", function (event) {
            event.preventDefault();
            guardarDatosEnLocalStorage();
        });
    }



    form.addEventListener("submit", function (event) {
        let validation = true;

        // Validación del campo Tipo de usuario (radio buttons)
        let userTypeRadios = document.querySelectorAll('input[name="userType"]');
        let userTypeValid = false;

        userTypeRadios.forEach((radio) => {
            if (radio.checked) {
                userTypeValid = true;
            }
        });

        if (!userTypeValid) {
            alert("Por favor, selecciona un tipo de usuario.");
            validation = false;
            event.preventDefault();
            return;
        }


        // Validación del campo Nombre
        let nombreInput = document.querySelector("input[name='nombre']");
        if (nombreInput.value.length < 3 || !/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/.test(nombreInput.value)) {
            alert("El nombre es incorrecto. Debe contener al menos 3 letras y caracteres válidos.");
            nombreInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            nombreInput.style.borderColor = "";
        }

        // Validación del campo Apellidos
        let apellidosInput = document.querySelector("input[name='apellidos']");
        if (!/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/.test(apellidosInput.value)) {
            alert("Los apellidos son incorrectos. Deben contener caracteres válidos.");
            apellidosInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            apellidosInput.style.borderColor = "";
        }

        // Validación del campo Email
        let emailInput = document.querySelector("input[name='email']");
        if (!/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/.test(emailInput.value)) {
            alert("El correo electrónico es incorrecto. Ingresa una dirección válida.");
            emailInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            emailInput.style.borderColor = "";
        }

        // Validación del campo Contraseña
        let contraseñaInput = document.querySelector("input[name='contraseña']");
        if (contraseñaInput.value.length < 6) {
            alert("La contraseña debe tener al menos 6 caracteres.");
            contraseñaInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            contraseñaInput.style.borderColor = "";
        }

        // Validación del campo Phone
        let phoneInput = document.querySelector("input[name='phone']");
        if (!/^[0-9]{9}$/.test(phoneInput.value)) {
            alert("El número de teléfono es incorrecto. Ingresa un número válido de 9 dígitos.");
            phoneInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            phoneInput.style.borderColor = "";
        }

        // Validación del campo DNI
        let dniInput = document.querySelector("input[name='dni']");
        if (!/^[0-9]{8}[A-Za-z]$/.test(dniInput.value)) {
            alert("El DNI es incorrecto. Ingresa un DNI válido con 8 dígitos y una letra.");
            dniInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            dniInput.style.borderColor = "";
        }

        // Validación del campo Nombre
        let RazonSocialInput = document.querySelector("input[name='nombre']");
        if (RazonSocialInput.value.length < 3 || !/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/.test(nombreInput.value)) {
            alert("La razon social es incorrecta. Debe contener al menos 3 letras y caracteres válidos.");
            RazonSocialInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            RazonSocialInput.style.borderColor = "";
        }

        // Validación del campo CIF
        let cifInput = document.querySelector("input[name='CIF']");
        if (!/^[A-HJNP-SUW][0-9]{7}[0-9A-J]$/.test(cifInput.value)) {
            alert("El CIF es incorrecto. Ingresa un CIF válido con el formato adecuado.");
            cifInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            cifInput.style.borderColor = "";
        }

        // Validación del campo DNI Gerente
        let dniGerenteInput = document.querySelector("input[name='DNI Gerente']");
        if (!/^[0-9]{8}[A-Za-z]$/.test(dniGerenteInput.value)) {
            alert("El DNI del Gerente es incorrecto. Ingresa un DNI válido con 8 dígitos y una letra.");
            dniGerenteInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            dniGerenteInput.style.borderColor = "";
        }

        // Validación del campo Escritura de constitución
        let escrituraInput = document.querySelector("input[name='escritura de Constitucion']");
        if (escrituraInput.value.length < 3) {
            alert("La Escritura de constitución es incorrecta. Debe contener al menos 3 caracteres.");
            escrituraInput.style.borderColor = "red";
            validation = false;
            event.preventDefault();
            return;
        } else {
            escrituraInput.style.borderColor = "";
        }


        if (!validation) {
            event.preventDefault();
            return;
        }

        // Almacena los datos en el localStorage
        guardarDatosEnLocalStorage();

        if (!validation) {
            event.preventDefault();
        }
    });


    function addCamps(nombreInput,nombreText) {
        // Crear un div
        let divElement = document.createElement('div');
        
        // Asignar un ID al div basado en el nombre del campo
        divElement.id = nombreInput;

        // Crear una etiqueta label
        let labelElement = document.createElement('label');
    
        // Crear un elemento abbr dentro de la etiqueta label
        let abbrElement = document.createElement('abbr');
        let strongElement = document.createElement('strong');
        strongElement.appendChild(document.createTextNode('* '));
        abbrElement.appendChild(strongElement);
        labelElement.appendChild(abbrElement);
        labelElement.appendChild(document.createTextNode(nombreText + ':'));
    
        // Crear un elemento input
        let inputElement = document.createElement('input');
        inputElement.setAttribute('type', 'text');
        inputElement.setAttribute('name', nombreInput);
        inputElement.setAttribute('id', nombreInput); // Asigna el mismo nombreInput como id
        inputElement.setAttribute('required', '');
    
        // Asigna el atributo "for" de la etiqueta label
        labelElement.setAttribute('for', nombreInput);
    
        // Agregar el label y el input al div
        divElement.appendChild(labelElement);
        divElement.appendChild(inputElement);
    
        // Obtener el div existente con la clase "form-buttons"
        let divBotones = document.querySelector('.form-buttons');
    
        // Insertar el nuevo div antes del div de botones
        divBotones.parentNode.insertBefore(divElement, divBotones);
    }
    
    
    function removeCamps(nombreInput) {
        // Obtener el elemento div por su ID
        let divElementToRemove = document.getElementById(nombreInput);

        // Verificar si el elemento existe antes de intentar eliminarlo
        if (divElementToRemove) {
            // Obtener el padre del div
            let divParent = divElementToRemove.parentNode;

            // Eliminar el div
            divParent.removeChild(divElementToRemove);
        }
    }
    function guardarDatosEnLocalStorage() {
        // Obtiene los valores de los campos comunes
        let nombre = document.querySelector("input[name='nombre']").value;
        let apellidos = document.querySelector("input[name='apellidos']").value;
        let domicilio = document.querySelector("input[name='domicilio']").value;
        let email = document.querySelector("input[name='email']").value;
        let contraseña = document.querySelector("input[name='contraseña']").value;
        let phone = document.querySelector("input[name='phone']").value;
        let dni = document.querySelector("input[name='dni']").value;
        let razonSocial = document.querySelector("input[name='RazonSocial']").value;

        // Verifica si el campo "CIF" existe en el formulario
        let cif = document.querySelector("input[name='CIF']");
        let cifValue = cif ? cif.value : "";

        // Verifica si el campo "DNI Gerente" existe en el formulario
        let dniGerente = document.querySelector("input[name='dniGerente']");
        let dniGerenteValue = dniGerente ? dniGerente.value : "";

        // Verifica si el campo "Escritura de constitución" existe en el formulario
        let escrituraConstitucion = document.querySelector("input[name='escrituraConstitucion']");
        let escrituraConstitucionValue = escrituraConstitucion ? escrituraConstitucion.value : "";

        // Almacena los valores en el localStorage
        localStorage.setItem("nombre", nombre);
        localStorage.setItem("apellidos", apellidos);
        localStorage.setItem("domicilio", domicilio);
        localStorage.setItem("email", email);
        localStorage.setItem("contraseña", contraseña);
        localStorage.setItem("phone", phone);
        localStorage.setItem("dni", dni);
        localStorage.setItem("RazonSocial", razonSocial);
        if (cif) localStorage.setItem("CIF", cifValue);
        if (dniGerente) localStorage.setItem("dniGerente", dniGerenteValue);
        if (escrituraConstitucion) localStorage.setItem("escrituraConstitucion", escrituraConstitucionValue);
    }

    function autorellenarCampos() {
        // Obtiene los valores almacenados en el localStorage
        let nombre = localStorage.getItem("nombre");
        let apellidos = localStorage.getItem("apellidos");
        let domicilio = localStorage.getItem("domicilio");
        let email = localStorage.getItem("email");
        let contraseña = localStorage.getItem("contraseña");
        let phone = localStorage.getItem("phone");
        let dni = localStorage.getItem("dni");
        let razonSocial = localStorage.getItem("RazonSocial");
    
        // Rellena los campos comunes con los valores almacenados
        document.querySelector("input[name='nombre']").value = nombre;
        document.querySelector("input[name='apellidos']").value = apellidos;
        document.querySelector("input[name='domicilio']").value = domicilio;
        document.querySelector("input[name='email']").value = email;
        document.querySelector("input[name='contraseña']").value = contraseña;
        document.querySelector("input[name='phone']").value = phone;
        document.querySelector("input[name='dni']").value = dni;
        document.querySelector("input[name='RazonSocial']").value = razonSocial;
    
        // Verifica si el campo "CIF" existe en el formulario y rellena si es necesario
        let cif = document.querySelector("input[name='CIF']");
        if (cif) {
            let cifValue = localStorage.getItem("CIF");
            cif.value = cifValue;
        }
    
        // Verifica si el campo "DNI Gerente" existe en el formulario y rellena si es necesario
        let dniGerente = document.querySelector("input[name='dniGerente']");
        if (dniGerente) {
            let dniGerenteValue = localStorage.getItem("dniGerente");
            dniGerente.value = dniGerenteValue;
        }
    
        // Verifica si el campo "Escritura de constitución" existe en el formulario y rellena si es necesario
        let escrituraConstitucion = document.querySelector("input[name='escrituraConstitucion']");
        if (escrituraConstitucion) {
            let escrituraConstitucionValue = localStorage.getItem("escrituraConstitucion");
            escrituraConstitucion.value = escrituraConstitucionValue;
        }
    }
    
});