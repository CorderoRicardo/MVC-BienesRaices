document.addEventListener('DOMContentLoaded', function () {
    eventListeners();

    darkMode();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    mobileMenu.addEventListener('click', navegacionResponsive);

    //muestra campos adicionales
    const metodoContacto = document.querySelectorAll(
        'input[name="contacto[contacto]"]'
    );
    metodoContacto.forEach((input) =>
        input.addEventListener('click', mostrarMetodosContacto)
    );

    const formatoPrecio = document.querySelectorAll('.formato-precio');
    formatoPrecio.forEach((precio) => {
        const formato = Number(precio.textContent);
        precio.textContent = '$' + formato.toLocaleString('en-US');
    });
}

function navegacionResponsive() {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('mostrar');
}

function darkMode() {
    const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)');

    if (prefiereDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    prefiereDarkMode.addEventListener('change', function () {
        if (prefiereDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });

    const botonDarkMode = document.querySelector('.dark-mode-boton');
    botonDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    });
}

function mostrarMetodosContacto(e) {
    const contactoDiv = document.querySelector('#contacto');
    if (e.target.value === 'telefono') {
        contactoDiv.innerHTML = `
            <label for="telefono">Número Telefónico</label>
            <input type="tel" placeholder="Tu telefono" id="telefono" name="contacto[telefono]"/>   
            
            <p>Elija la fecha y la hora</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]"/>

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]"/>                 
        `;
    } else {
        contactoDiv.innerHTML = `
            <label for="email">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]"/ required>        
        `;
    }
}
