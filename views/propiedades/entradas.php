<table class="propiedades">
    <thead>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Autor</th>
        <th>Acciones</th>
    </thead>

    <tbody><!--Mostrar los resultados-->
        <?php foreach($entradas as $entrada): ?>
        <tr>
            <td> <?php echo $entrada->id; ?></td>
            <td> <?php echo $entrada->titulo ?></td>
            <td class=" tdImage"><img src="../imagenes/entradas/<?php echo $entrada->imagen ?>" class="imagen-tabla"></td>
            <td> <?php echo $entrada->autor ?> </td>
            <td>
                <form method="POST" class="w-100" action="/entradas/eliminar">
                    <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
                    <input type="hidden" name="tipo" value="entrada">
                    <input type="submit" class="boton-rojo" value="Eliminar">
                </form>
                <a href="entradas/actualizar?id=<?php echo $entrada->id ?>" class="boton-amarillo">Actualizar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>