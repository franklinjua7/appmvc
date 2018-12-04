<h1 class="page-header">Proveedores</h1>
<div class="well well-sm text-right">
	<a href="?c=Proveedor&a=Crud" class="btn btn-primary">Nuevo Proveedor</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width: 180px;">Razón Social</th>
			<th>Ruc</th>
			<th style="width: 60px;"></th>
			<th style="width: 60px; "></th>
		</tr>
	</thead>
	<tbody>
		<?php
		//var_dump($this->model->Listar());
		foreach ($this->model->Listar() as $r) :
		?>
		
		<tr>
			<td><?php echo $r->razon_social; ?></td>
			<td><?php echo $r->ruc; ?></td>
			<td>
				<a href="?c=Proveedor&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
			</td>
			<td>
				<a href="?c=Proveedor&a=Eliminar&id=<?php echo $r->id; ?>" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">Eliminar</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>