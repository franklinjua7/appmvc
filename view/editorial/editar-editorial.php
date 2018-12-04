
<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->nombre_editorial : 'Nuevo Registro';?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Editorial">Editorial</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->nombre_editorial : 'Nuevo Editorial'; ?></li>
</ol>

<form id="frm-autor" action="?c=Editorial&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Editorial</label>
        <input type="text" name="nombre_editorial" class="form-control text-center" value="<?php echo $alm->nombre_editorial; ?>" class="form-control" placeholder="Ingrese Editorial" required />
    </div>
       
    <div class="text-right">
        <button type ="submit" class="btn btn-success">Guardar</button>
    </div>
</form>