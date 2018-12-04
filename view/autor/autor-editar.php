
<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombres . ' ' . $alm->ApellidoPaterno . ' ' . $alm->ApellidoMaterno  : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Autor">Autor</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombres . ' ' . $alm->ApellidoPaterno . ' ' . $alm->ApellidoMaterno : 'Nuevo Autor'; ?></li>
</ol>

<form id="frm-autor" action="?c=Autor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" name="Nombres" class="form-control text-center" value="<?php echo $alm->Nombres; ?>" class="form-control" placeholder="Ingrese su nombre" required />
    </div>
    
    <div class="form-group">
        <label>Apellido Paterno</label>
        <input type="text" name="ApellidoPaterno" class="form-control text-center" value="<?php echo $alm->ApellidoPaterno; ?>" class="form-control" placeholder="Ingrese su Apellido Paterno" required />
    </div>

    <div class="form-group">
        <label>Apellido Materno</label>
        <input type="text" name="ApellidoMaterno" class="form-control text-center" value="<?php echo $alm->ApellidoMaterno; ?>" class="form-control" placeholder="Ingrese su Apellido Materno" required />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text"  class="form-control text-center" name="Email" value="<?php echo $alm->Email; ?>" class="form-control" placeholder="Ingrese su correo electrónico" required />
    </div>
    
    <div class="form-group">
        <label>Sexo</label>
        <select class="form-control" name="sexo_id">
            
            <?php foreach ($sexos as $sexo)  :?> 
                <option 
                    <?php echo $alm->sexo_id == $sexo->id ? 'selected' : ''; ?> 
                        value = <?php echo $sexo->id ?>>
                        <?php echo $sexo->nombre_sexo ?>
                </option>    
            <?php endforeach; ?>
        </select>
    </div>
    
    <div class="form-group">
        <label>Estado</label>
        <select  class="form-control" name="estado_id">
            
            <?php foreach ($estados as $estado)  :?> 
                <option 
                    <?php echo $alm->estado_id == $estado->id ? 'selected' : ''; ?> 
                        value = <?php echo $estado->id ?>>
                        <?php echo $estado->nombre_estado ?>
                </option>    
            <?php endforeach; ?>
        </select>
    </div>

    
    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input  type="text" class="form-control text-center" name="FechaNacimiento" value="<?php echo $alm->FechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" required />
    </div>
    
    <div class="form-group">
        <label>Pais de Nacimiento</label>
        <input type="text" class="form-control text-center" name="PaisNacimiento" value="<?php echo $alm->PaisNacimiento; ?>" class="form-control" placeholder="Ingrese su Pais de Nacimiento" required />
    </div>

    <div class="form-group">
        <label>Celular</label>
        <input type="text" maxlength="9" class="form-control text-center"  name="Celular" value="<?php echo $alm->Celular; ?>" class="form-control" placeholder="Ingrese su Celular" required />
    </div>

    <hr />
    
    <div class="text-right">
        <button type ="submit" class="btn btn-success">Guardar</button>
    </div>
</form>