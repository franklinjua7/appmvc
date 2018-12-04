
<h1 class="page-header">Géneros</h1>
<div class="well well-sm text-right">
	<a href="?c=Genero&a=Crud" class="btn btn-primary">Nuevo Género</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width: 180px;">Nombre</th>
			<th style="width: 60px;"></th>
			<th style="width: 60px; "></th>
		</tr>
	</thead>
	<tbody>
		<?php
		//var_dump($this->model->Listar());
		//foreach ($this->model->Listar() as $r) :
		foreach($alm as $r):
		?>
		
		<tr>
			<td><?php echo $r->nombre_genero; ?></td>
			<td>
				<a href="?c=Genero&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
			</td>
			<td>
				<a href="?c=Genero&a=Eliminar&id=<?php echo $r->id; ?>" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">Eliminar</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>