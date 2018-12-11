<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<h3 class="text-center">
			<strong><i class="fa fa-list" aria-hidden="true"></i>&nbsp; Listado de Libros &nbsp;
				<i class="fa fa-list" aria-hidden="true"></i>
			</strong>
		</h3>
		<a class="btn btn-primary" href="..\?c=Libro&a=RegistrarLibro">Registrar Libro</a>
		<a class="btn btn-success" href="..\?c=Libro&a=ReporteLibros">Generar PDF</a>
		<div class="table-responsive" id="lista-libro">
			<table class="table table-hover" id="tbl-libro">
				<thead>
					<tr>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="id" data-type="numeric">id</th>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="nombre_libro">Nombre del Libro</th>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="numero_paginas" data-type="numeric"># de páginas</th>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="anio_edicion">Año</th>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="FechaPublicacion">Fecha Publicación</th>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="RutaImagenReferencia"  data-formatter="Foto">Foto</th>
						<th class="text-center" style="vertical-align: middle;" 
						data-column-id="commands" data-formatter="commands" 
						data-sortable="false">Acciones</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
