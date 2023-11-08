function validarNombre(input) {
    const nombreError = document.getElementById('nombreError');
    const submitButton = document.getElementById('submitButton');
    
    if (/^\d/.test(input.value) || input.value.length > 50 || /\d/.test(input.value)) {
        nombreError.classList.remove('d-none');
        submitButton.disabled = true;
    } else {
        nombreError.classList.add('d-none');
        submitButton.disabled = false;
    }
}

function validarApellido(input, errorId) {
    const apellidoError = document.getElementById(errorId);
    const submitButton = document.getElementById('submitButton');

    if (/^\d/.test(input.value) || input.value.length > 25 || /\d/.test(input.value)) {
        apellidoError.classList.remove('d-none');
        submitButton.disabled = true;
    } else {
        apellidoError.classList.add('d-none');
        submitButton.disabled = false;
    }
}

function validarMatricula(input) {
    const matriculaError = document.getElementById('matriculaError');
    const submitButton = document.getElementById('boton');

    if (input.value.length > 9 || !/^[A-Za-z0-9]+$/.test(input.value)) {
        matriculaError.classList.remove('d-none');
        submitButton.disabled = true;
    } else {
        matriculaError.classList.add('d-none');
        submitButton.disabled = false;
    }
}

function validarGrupo(input) {
    const grupoError = document.getElementById('grupoError');
    const submitButton = document.getElementById('submitButton');

    if (/[\s!@#$%^&*()_+{}\[\];':"\\|,.<>\/?~]/.test(input.value) || input.value.length > 4) {
        grupoError.classList.remove('d-none');
        submitButton.disabled = true;
    } else {
        grupoError.classList.add('d-none');
        submitButton.disabled = false;
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const nombreInput = document.getElementById('exampleInputNombre');
    nombreInput.addEventListener('input', function() {
        validarNombre(this);
    });

    const pApellidoInput = document.getElementById('exampleInputPassword1');
    pApellidoInput.addEventListener('input', function() {
        validarApellido(this, 'pApellidoError');
    });

    const sApellidoInput = document.getElementById('exampleInputEmail1');
    sApellidoInput.addEventListener('input', function() {
        validarApellido(this, 'sApellidoError');
    });

    const matriculaInput = document.getElementById('errorm');
    matriculaInput.addEventListener('input', function() {
        validarMatricula(this);
    });
    const grupoInput = document.getElementById('exampleInputGroup');
    grupoInput.addEventListener('input', function() {
        validarGrupo(this);
    });

    const form = document.getElementById('validacion');
    form.addEventListener('submit', function(event) {
        if (/^\d/.test(nombreInput.value) || nombreInput.value.length > 50 || /\d/.test(nombreInput.value)) {
            event.preventDefault();
            alert('El nombre no debe contener números ni exceder los 50 caracteres. Corrige el campo antes de enviar el formulario.');
        }

        if (/^\d/.test(pApellidoInput.value) || pApellidoInput.value.length > 25 || /\d/.test(pApellidoInput.value)) {
            event.preventDefault();
            alert('El primer apellido no debe contener números ni exceder los 25 caracteres. Corrige el campo antes de enviar el formulario.');
        }

        if (/^\d/.test(sApellidoInput.value) || sApellidoInput.value.length > 25 || /\d/.test(sApellidoInput.value)) {
            event.preventDefault();
            alert('El segundo apellido no debe contener números ni exceder los 25 caracteres. Corrige el campo antes de enviar el formulario.');
        }

        if (matriculaInput.value.length > 9 || !/^[A-Za-z0-9]+$/.test(matriculaInput.value)) {
            event.preventDefault();
            alert('La matrícula no debe exceder los 9 caracteres, ni contener espacios ni caracteres especiales. Corrige el campo antes de enviar el formulario.');
        }

        if (/[\s!@#$%^&*()_+{}\[\];':"\\|,.<>\/?~]/.test(grupoInput.value) || grupoInput.value.length > 4) {
            event.preventDefault();
            alert('El grupo no debe contener caracteres especiales ni espacios y no debe exceder los 4 caracteres. Corrige el campo antes de enviar el formulario.');
        }
    });
});
