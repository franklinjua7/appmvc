<!--?php var_dump($alm) ?-->
<h1 class="page-header">
    VER LIBRO
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Libro">Libro</a></li>
  <li class="active"><?php echo $alm->nombre_libro; ?></li>
</ol>

<form id="frm-autor" action="?c=Libro&a=Index" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Libro</label>
        <input type="text" name="nombre_libro" class="form-control text-center" value="<?php echo $alm->nombre_libro; ?>" class="form-control" placeholder="Ingrese Libro" readonly />
    </div>
    <div class="row form-group">
        <div class="col-xs-12 col-sm-6">
            <label for="nombre_libro">Título del Libro</label>
            <input type="text" id="nombre_libro" name="nombre_libro" readonly class="form-control text-center" placeholder="Nombre del Libro" value="<?php echo $alm->nombre_libro; ?>">
            <span id="ErrorMensaje-nombre_libro" class="help-block"></span>
        </div>
        <div class="col-xs-12 col-sm-6">
            <label for="editorial_id">Editorial</label>
            <input type="text" id="editorial_id" name="editorial_id" readonly class="form-control text-center" placeholder="Editorial" value="<?php echo $alm->nombre_editorial; ?>">
        </div>
    </div>

    <div class="row form-group">
        <div class="col-xs-12 col-sm-6">
            <label for="estado_id">Estado</label>
            <input type="text" id="estado_id" name="estado_id" readonly class="form-control text-center" placeholder="Editorial" value="<?php echo $alm->nombre_estado; ?>">
        </div>
               
        <div class="col-xs-12 col-sm-6">
            <label for="genero_id">Género</label>
            <input type="text" id="genero_id" name="genero_id" readonly class="form-control text-center" placeholder="Editorial" value="<?php echo $alm->nombre_genero; ?>">
         </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-3">
            <label for="numero_paginas"># de páginas</label>
            <input type="number" id="numero_paginas" class="form-control text-center" name="numero_paginas" value="<?php echo $alm->numero_paginas; ?>" readonly>
        </div>
        <div class="col-xs-12 col-sm-3">
            <label for="anio_edicion">Año de Edición</label>
            <input type="number" id="anio_edicion" class="form-control text-center" name="anio_edicion" value="<?php echo $alm->anio_edicion; ?>" readonly>
        </div>
        <div class="col-xs-12 col-sm-3">
            <label for="FechaPublicacion">Fecha Publicación</label>
            <input type="date" id="FechaPublicacion" class="form-control text-center" name="FechaPublicacion" value="<?php echo $alm->FechaPublicacion; ?>" readonly>
        </div>
        <div class="col-xs-12 col-sm-3">
            <label for="numero_paginas">ISBN</label>
            <input type="text" id="codigo_isbn" class="form-control text-center" name="codigo_isbn" value="<?php echo $alm->codigo_isbn; ?>" placeholder="codigo isbn" readonly>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <label for="resumen">Resumen</label>
            <input type="text" id="resumen" name="resumen" class="form-control" rows="10" value="<?php echo $alm->resumen; ?>" readonly></textarea>
        </div>
    </div>
           <br>
    <div class="row">
        <div class="col-xs-12">
            <label for="Imagen">Imagen</label>
            <img src="<?php echo $alm->RutaImagenReferencia; ?>" alt="">
        </div>
    </div>
       
    <div class="text-right">
        <button type ="submit" class="btn btn-success">Atras</button>
    </div>
</form>