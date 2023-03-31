<fieldset>
    <legend>Información general</legend>

    <label for="titulo">Titulo:</label>
    <input 
        type="text" 
        id="titulo" 
        name="entrada[titulo]" 
        placeholder="Titulo entrada" 
        value="<?php echo cleanHTML($entrada->titulo);?>"
    >

    <label for="autor">Autor:</label>
    <input 
        type="text" 
        id="autor" 
        name="entrada[autor]" 
        placeholder="Nombre del autor" 
        value="<?php echo cleanHTML($entrada->autor);?>"
    >

    <label for="imagen">Imagen:</label>
    <input type="file" id="imagen" name="entrada[imagen]" accept="image/jpeg, image/png">

    <label for="contenido">Contenido:</label>
    <?php if($entrada->imagen): ?>
        <div class="imagen-small">
            <img src="../imagenes/entradas/<?php echo $entrada->imagen; ?>">
        </div>
    <?php endif; ?>
    <textarea id="contenido" name="entrada[contenido]"><?php echo cleanHTML($entrada->contenido);?></textarea>
</fieldset>

