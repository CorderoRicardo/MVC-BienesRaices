<?php foreach($entradas as $entrada): ?>
    <article class="entrada-blog">
        <div class="imagen"> <?php  ?>
            <img 
                loading="lazy" 
                src="../imagenes/entradas/<?php echo $entrada->imagen; ?>" 
                alt="imagen entrada blog">
        </div>
        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $entrada->id; ?>">
                <h4><?php echo $entrada->titulo; ?></h4>
                <p class="informacion-meta">
                    Escrito el <span><?php echo date_format(date_create($entrada->creado),"d/m/Y"); ?></span> por
                    <span><?php echo $entrada->autor; ?></span>                    
                </p>
                <p>
                    <?php echo substr($entrada->contenido,0,100); ?>...
                </p>
            </a>
        </div>
    </article>
<?php endforeach; ?>