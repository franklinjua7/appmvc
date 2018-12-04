<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<h1>Lista de Tratamientos</h1>
<div class="container">
	<h1>Limpeza Bucal</h1>
	
	<form action="">
		<button>Guardar</button>
		<button>Editar</button>
		<button>Agregar</button>
		<a href="#" id="insert-more">Agregar</a>
		<table class="table" id="mytable">
			<thead>
				<tr>
					<th>id</th>
					<th>Empresa</th>
					<th>Sede Clínica</th>
					<th>Precio</th>
					<th>Moneda</th>
					<th>OPCIONES</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>12</td>
					<td>
						<select name="empresas" id="">
							<option value="1">Particular</option>
							<option value="2">Sedapal</option>
							<option value="3">Oleoducto</option>
							<option value="4">PetroPerú</option>
						</select>
					</td>
					<td>Miraflores</td>
					<td>
						<input type="text" id="precio" class="fee" name="precio">
					</td>
					<td>
						<input type="text" id="fee-2" class="fee" name="moneda">
					</td>
					<td><button>Eliminar</button></td>
					<td><a href="#">Edit</a></td>
				</tr>
			</tbody>
		</table>	
	</form>
</div>
<div class="container">
<a href="#" id="insert-more"> Add New Row </a>
    <br>
<table id="mytable">
    <thead>
        <th>Col 1</th>
        <th>Col 2</th>
        <th>Col 3</th>
        <th>Col 4</th>
    </thead>
    <tbody>
        <tr>
            <td>
                <select name="code">
                    <option value="1">javascript</option>
                    <option value="2">PHP mysql</option>
                </select>
            </td>
            <td>
                <input type="text" id="fee-1" class="fee" name="js-fee">
            </td>
            <td>
                <input type="text" id="fee-2" class="fee" name="php-fee">
            </td>
            <td><a href="#">edit</a>
            </td>
            <td><a href="#" id="delete">eliminar</a></td>
        </tr>
    </tbody>
</table>
	
</div>

<script type="text/javascript">

	$("#insert-more").click(function () {
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
             console.log('se');
         } else {
             $(this).append(tds);
             console.log('Else');
         }
     });
});

	$("#delete").click(function() {
		$('tbody').each('tr:first td', this).remove();
		console.log('eliminado');
	});

</script>