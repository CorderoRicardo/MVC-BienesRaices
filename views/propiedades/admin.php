<main class="contenedor">
    <h1>Administrador de Bienes Raices</h1>
    <a href="/propiedades/crear" class="boton boton-verde-inline">Nueva propiedad</a>
    <a href="/vendedores/crear" class="boton boton-amarillo-inline">Nuevo vendedor</a>
    <h2>Propiedades</h2>
    <?php 
        if($resultado){
            $mensaje = mostrarNotificacion($resultado);
            if($mensaje){
    ?>
                <p class="alerta exito">
                    <?php echo cleanHTML($mensaje); ?>
                </p>    
    <?php
            }
        }
    ?>

    <table class="propiedades">
            <thead>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </thead>

            <tbody><!--Mostrar los resultados-->
                <?php foreach($propiedades as $propiedad): ?>
                <tr>
                    <td> <?php echo $propiedad->id; ?></td>
                    <td> <?php echo $propiedad->titulo ?></td>
                    <td class=" tdImage"><img src="../imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla"></td>
                    <td> <?php echo '$' . $propiedad->precio ?> </td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" class="boton-rojo" value="Eliminar">
                        </form>
                        <a href="propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

    </table>
</main>