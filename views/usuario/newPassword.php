
<?php 
$id= $_SESSION['recuperarPass'];
var_dump($_SESSION['recuperarPass']);
?>
<div class="container">
<h1>Recuperar Contraseña</h1>
<form action="<?=base_url?>Usuario/actualizarPassword" method="POST" id="datos_formulario">
    <input type="hidden" name="id" value="<?=$_SESSION['recuperarPass'] ?>">
  <div class="form-group">
    <label for="password">Ingresa la nueva contraseña</label>
    <input type="text" name="password" class="form-control" id="password" required>
    
  </div>
  
  <button type="submit" class="btn btn-primary">Siguiente</button>
  
</form>
</div>

<script>
	
	
</script>