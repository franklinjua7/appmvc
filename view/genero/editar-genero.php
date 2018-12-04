
<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre_genero : 'Nuevo Registro';?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Genero">Género</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre_genero : 'Nuevo Género'; ?></li>
</ol>

<form id="frm-autor" action="?c=Genero&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Género</label>
        <input type="text" name="nombre_genero" class="form-control text-center" value="<?php echo $alm->nombre_genero; ?>" class="form-control" placeholder="Ingrese Género" required />
    </div>
       
    <div class="text-right">
        <button type ="submit" class="btn btn-success">Guardar</button>
    </div>
</form>