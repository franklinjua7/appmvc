
<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->razon_social:'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Proveedor">Proveedor</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->razon_social : 'Nuevo Proveedor'; ?></li>
</ol>

<form id="frm-autor" action="?c=Proveedor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Razón Social</label>
        <input type="text" name="razon_social" class="form-control text-center" value="<?php echo $alm->razon_social; ?>" class="form-control" placeholder="Ingrese Razón Social" required />
    </div>
    
    <div class="form-group">
        <label>Ruc</label>
        <input type="text" name="ruc" class="form-control text-center" value="<?php echo "$alm->ruc"; ?>" class="form-control" placeholder="Ingrese RUC" required />
    </div>
    
    <div class="text-right">
        <button type ="submit" class="btn btn-success">Guardar</button>
    </div>
</form>