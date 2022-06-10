<?php $usuario = Utils::showUsuario();
?>

<?php 


?>



<div class="container">

<h1>Actualizar Datos</h1>

<form action="<?=base_url?>usuario/update" method="POST">
    
	<input type="hidden" name="id" value="<?= $usuario->id?>" />

	<div class="form-group">
	<label for="nombre">Nombre</label>
	<input type="text"  class="form-control"  name="nombre" value="<?= $usuario->nombre?>" required/>
	</div>

	<div class="form-group">
	<label for="rfc">Rfc</label>
	<input type="text"  class="form-control"  name="rfc"  value="<?= $usuario->rfc?>"  required/>
	</div>

	<div class="form-group">
	<label for="correo">Correo</label>
	<input type="email"  class="form-control"  name="correo"  value="<?= $usuario->correo?>" required/>
	</div>
    
	<div class="form-group">
	<label for="telefono">Teléfono</label>
	<input type="number"  class="form-control"  name="telefono" value="<?= $usuario->telefono?>" required/>
	</div>

	<div class="form-group">
	<label for="website">Web Site</label>
	<input type="text"  class="form-control"  name="website"  value="<?= $usuario->website?>" required/>
	</div>
	
	<button type="submit" class="btn btn-primary">Actualizar</button>

	
</form>
</div>
