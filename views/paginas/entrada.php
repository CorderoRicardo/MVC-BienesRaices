<main class="contenedor seccion contenido-centrado">
    <h1><?php echo $entrada->titulo; ?></h1>
    <picture>
        <!-- <source srcset="build/img/destacada2.webp" type="image/webp" />
        <source srcset="build/img/destacada2.jpg" type="image/jpeg" /> -->
        <img loading="lazy" src="../imagenes/entradas/<?php echo $entrada->imagen; ?>" alt="Imagen entrada blog" />
    </picture>
    <div class="resumen-propiedad">
        <p class="informacion-meta">
            Escrito el <span><?php echo date_format(date_create($entrada->creado), "d/m/Y"); ?></span> por <span><?php echo $entrada->autor; ?></span>
        </p>
        <?php
        foreach ($parrafos as $parrafo) :
            if (strlen($parrafo) > 1) :
        ?>
                <p><?php echo $parrafo; ?></p>
        <?php
            endif;
        endforeach; ?>
    </div>
</main>