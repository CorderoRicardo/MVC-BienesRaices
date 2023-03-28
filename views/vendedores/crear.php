<main class="contenedor">
    <h1>Registrar vendedor</h1>

    <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error?>
        </div>
    <?php endforeach;?>

    <a href="/admin" class="boton boton-verde-inline">Volver</a>

    <form class="formulario" method="POST" action="/vendedores/crear">
        <?php include __DIR__.'/formulario.php'; ?>
        <input type="submit" value="Registrar vendedor" class="boton boton-verde-inline">
    </form>
</main>