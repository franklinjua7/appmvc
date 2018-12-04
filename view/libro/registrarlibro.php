
      <form id="FrmRegistrarLibro" action="\?c=Libro&a=GuardarLibro" method="POST" role="form" enctype="multipart/form-data">

        <div class="row">
          <div class="col-xs-12">
            <h1 class="text-center">Registro de Libros</h1>   
          </div>
        </div>
           
           <div class="row form-group">
               <div class="col-xs-12 col-sm-6">
                   <label for="nombre_libro">Título del Libro</label>
                   <input type="text" id="nombre_libro" name="nombre_libro" required class="form-control text-center" placeholder="Nombre del Libro">
                   <span id="ErrorMensaje-nombre_libro" class="help-block"></span>
               </div>
               <div class="col-xs-12 col-sm-6">
                   <label for="editorial_id">Editorial</label>
                   <select name="editorial_id" id="editorial_id" class="form-control">
                    <?php foreach ($editoriales as $editorial) :?>
                      <option value= <?php echo $editorial->id; ?>><?php echo $editorial->nombre_editorial; ?> </option>
                    <?php endforeach; ?>
                    </select>
               </div>
            </div>
           <div class="row form-group">
            <div class="col-xs-12 col-sm-6">
                   <label for="estado_id">Estado</label>
                   <select name="estado_id" id="estado_id" class="form-control">
                    <?php foreach ($estados as $estado): ?>
                      <option value= <?php echo $estado->id; ?>><?php echo $estado->nombre_estado; ?></option>
                    <?php endforeach; ?>
                    </select>
            </div>
               
           <div class="col-xs-12 col-sm-6">
                   <label for="genero_id">Genero</label>
                   <select name="genero_id" id="genero_id" class="form-control">
                      <?php foreach ($generos as $genero): ?>
                      <option value= <?php echo $genero->id; ?>><?php echo $genero->nombre_genero; ?></option>
                    <?php endforeach; ?>
                    </select>
               </div>
               
           </div>
           
           <div class="row">
               <div class="col-xs-12 col-sm-3">
                   <label for="numero_paginas"># de páginas</label>
                   <input type="number" id="numero_paginas" class="form-control text-center" name="numero_paginas" value="1">
                   <span id="ErrorMensaje-numero_paginas" class="help-block"></span>
               </div>
               <div class="col-xs-12 col-sm-3">
                   <label for="anio_edicion">Año de Edición</label>
                   <input type="number" id="anio_edicion" class="form-control text-center" name="anio_edicion" value="1980">
                   <span id="ErrorMensaje-anio-edicion" class="help-block"></span>
               </div>
               <div class="col-xs-12 col-sm-3">
                   <label for="FechaPublicacion">Fecha Publicación</label>
                   <input type="date" id="FechaPublicacion" class="form-control text-center" name="FechaPublicacion">
                   <span id="ErrorMensaje-FechaPublicacion" class="help-block"></span>
               </div>
               <div class="col-xs-12 col-sm-3">
                   <label for="numero_paginas">ISBN</label>
                   <input type="text" id="codigo_isbn" class="form-control text-center" name="codigo_isbn" value="" placeholder="codigo isbn">
                   <span id="ErrorMensaje-codigo_isbn" class="help-block"></span>
               </div>
           </div>
           
           <div class="row">
               <div class="col-xs-12">
                   <label for="resumen">Resumen</label>
                   <textarea type="resumen" id="resumen" name="resumen" class="form-control" rows="10" required></textarea>
                   <span id="ErrorMensaje-resumen" class="help-block"></span>
               </div>
           </div>
           <br>
           <div class="row">
               <div class="col-xs-12">
                   <label for="Imagen">Imagen</label>
                   <input type="checkbox" id="bimagenReferencia" class="bimagenReferencia">
                   <input type="file" style="display: inline" id="RutaImagenReferencia" name="RutaImagenReferencia" accept=".jpg, .jpeg, .png">
                   
               </div>
           </div>
           
           <div class="form-group">
               <fieldset>
                   <legend><h4>Autor o Autores en el Libro</h4></legend>
                   <div class="row">
                       <div class="col-xs-12 col-sm-2">
                           <button type="button" class="btnAgregarAutor btn btn-success pull-left">
                           <i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Agregar</button>
                       </div>
                       <div class="col-xs-12 col-sm-6">
                           <select name="autor_id" id="autor_id" class="form-control">
                              <?php foreach($autores as $autor): ?>
                              <option value=<?php echo $autor->id; ?>><?php echo $autor->Nombres." ".$autor->ApellidoPaterno." ".$autor->ApellidoMaterno; ?></option>
                            <?php endforeach; ?>
                            </select>
                       </div>
                   </div>
                   <span id="ErrorMensaje-tabla" class="help-block"></span>
                   <div class="table-responsive">
                       <table id="tabla" class="table table-hover">
                           <thead>
                               <tr>
                                   <th class="color-azul text-center">Autor</th>
                                   <th class="color-azul text-center">Acciones</th>
                               </tr>
                           </thead>
                           <tbody>
                           </tbody>
                       </table>
                   </div>
               </fieldset>
           </div>

           <div class="row">
            <div class="col-xs-12">
               <button type="submit" id="btnRegistrarLibro" class="btnRegistrarLibro btn btn-success pull-left" >Registrar Libro
                           <!--i class="fa fa-plus" aria-hidden="true"></i>Agregar</button-->
           </div>
          </div>
        </form>
            
