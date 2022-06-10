

<div class="container">


<h1>Agregar Nuevo usuario</h1>

<form action="<?=base_url?>usuario/save" method="POST">

<div class="form-group">
    <input type="hidden" name="id" value="<?= $_SESSION['identity']->id ?>" />
    <input type="hidden" class="form-control" name="bandera" value="true" />

	<div class="form-group">
	<label for="nombre">Nombre</label>
	<input type="text" class="form-control" name="nombre" required/>
	</div>
	<div class="form-group">
	<label for="rfc">Rfc</label>
	<input type="text" class="form-control" name="rfc" maxlength="13" required/>
	</div>
    <div class="form-group">
	<label for="direccion">Dirección</label>
	<input type="text" class="form-control"  name="direccion" required/>
	</div>
    <div class="form-group">
	<label for="telefono">Teléfono</label>
	<input type="text" class="form-control" name="telefono" maxlength="10" required/>
	</div>
    <div class="form-group">
	<label for="website">Website</label>
	<input type="text" class="form-control" name="website" required/>
	</div>

	<div class="form-group">
	<label for="correo">Correo</label>
	<input type="email" class="form-control" name="correo" required/>
	</div>
	<div class="form-group">
	<label for="password">Contraseña</label>
	<input type="password" class="form-control" name="password" required/>
	</div>
	<div class="form-group">
	<label for="confirmarPassword">Confirmar contraseña</label>
	<input type="password" class="form-control" name="confirmarPassword" required/>
</div>
	<button type="submit" class="btn btn-primary">Registrar</button>
	
</form>

</div>