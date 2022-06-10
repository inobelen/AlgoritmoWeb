<?php 
if(isset($user) && is_object($user))
?>
	
<div class="container">

<h1>Editar Datos</h1>

<form action="<?=base_url?>usuario/update" method="POST">
    
	<input type="hidden" name="id" value="<?= $user->id?>" />
    <input type="hidden" name="bandera" value="true" />

	<div class="form-group">
	<label for="nombre">Nombre</label>
	<input type="text"  class="form-control" name="nombre" value="<?= $user->nombre?>" required/>
	</div>
	<div class="form-group">
	<label for="rfc">Rfc</label>
	<input type="text"  class="form-control" name="rfc"  value="<?= $user->rfc?>" maxlength="13" required/>
	</div>
	<div class="form-group">
	<label for="correo">Correo</label>
	<input type="email"  class="form-control" name="correo"  value="<?= $user->correo?>" required/>
	</div>

	<div class="form-group">

	<label for="telefono">Teléfono</label>
	<input type="number"  class="form-control" name="telefono" value="<?= $user->telefono?>" maxlength="10" required/>
	</div>

	<div class="form-group">

	<label for="website">Web Site</label>
	<input type="text"  class="form-control" name="website"  value="<?= $user->website?>" required/>
	</div>

	<div class="form-group">

	<label for="direccion">Dirección</label>
	<input type="text"  class="form-control" name="direccion"  value="<?= $user->direccion?>" required/>
	</div>

	<input type="submit" class="btn btn-dark" value="Actualizar" />
</form>

</div>	