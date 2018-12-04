<div class="container contact-form">
            <div class="contact-image">
                <img src="../assets/img/contacto.png" alt="Solicitud de Baja"/>
            </div>
            <form method="post" action="..\?c=Usuario&a=EnviarBajarUsuario">
                <h3>Solicitud de Baja de Usuario</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtName">Usuario:</label>
                            <input type="text" readonly name="txtName" class="form-control text-center"  value="<?php echo $_SESSION['user'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="txtEmail">Correo Electrónico:</label>
                            <input type="text" readonly name="txtEmail" class="form-control  text-center" value="<?php echo $_SESSION['emailid'] ?>" />
                        </div>
                        <div class="form-group">
                            <label for="txtTipoSolicitud">Asunto:</label>
                            <input type="text" readonly name="txtTipoSolicitud" class="form-control text-center" value="Solicito Baja de Usuario" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnSubmit" class="btn btn-primary" value="Enviar Solicitud" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="txtMsg">Mensaje:</label>
                            <textarea name="txtMsg" class="form-control" placeholder="Fundamente su solicitud de Baja" 
                                style="width: 100%; height: 200px;"></textarea>
                        </div>
                    </div>
                </div>
            </form>
</div>

