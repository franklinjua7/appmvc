<h1 class="page-header">Autores</h1>
<div class="well well-sm text-right">
	<a href="?c=Autor&a=Crud" class="btn btn-primary">Nuevo Autor</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width: 180px;">Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th style="width: 120px;">Sexo</th>
			<th style="width: 120px;">Estado</th>
			<th style="width: 60px;"></th>
			<th style="width: 60px; "></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($this->model->Listar() as $r) :
		?>
		<tr>
			<td><?php echo $r->Nombres; ?></td>
			<td><?php echo $r->ApellidoPaterno; ?></td>
			<td><?php echo $r->Email; ?></td>
			<td><?php echo $r->sexo_id==1 ? 'Hombre':'Mujer'; ?></td>
			<td><?php echo $r->estado_id==1 ? 'ACTIVO':'INACTIVO'; ?></td>
			<td>
				<a href="?c=Autor&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
			</td>
			<td>
				<a href="?c=Autor&a=Eliminar&id=<?php echo $r->id; ?>" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">Eliminar</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>