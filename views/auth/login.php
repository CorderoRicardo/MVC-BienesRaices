<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach($errores as $error): ?>
        <p class="alerta error"><?php echo $error; ?></p>
    <?php endforeach; ?>
    <form method="POST" class="formulario" novalidate action="/login">
        <fieldset>
            <legend>
                Email y Password
            </legend>

            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="Tu Email" id="email">

            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Tu constraseña" id="password">                    
        </fieldset>

        <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
    </form>
</main>