<h1 class="page-header">Libros</h1>
<div class="well well-sm text-right">
	<a href="?c=Libro&a=RegistrarLibro" class="btn btn-primary">Nuevo Libro</a>
</div>

<table class="table table-striped">
	<thead>
		<tr>
			<th style="width: 180px;">Nombres</th>
			<th>Editorial</th>
			<th>Estado</th>
			<th style="width: 120px;">Genero</th>
			<th style="width: 120px;">Páginas</th>
			<th style="width: 60px;"></th>
			<th style="width: 60px; "></th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($this->model->Listar() as $r) :
		?>
		<tr>
			<td><?php echo $r->nombre_libro; ?></td>
			<td><?php echo $r->editorial_id; ?></td>
			<td><?php echo $r->estado_id==1 ? 'ACTIVO':'INACTIVO'; ?></td>
			<td><?php echo $r->genero_id; ?></td>
			<td><?php echo $r->numero_paginas==1 ? 'ACTIVO':'INACTIVO'; ?></td>
			<td>
				<a href="?c=Libro&a=Crud&id=<?php echo $r->id; ?>">Editar</a>
			</td>
			<td>
				<a href="?c=Libro&a=Eliminar&id=<?php echo $r->id; ?>" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');">Eliminar</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>