<?php $usuarios = Utils::showUsuarios();
?>
<div class="container">
<h1>Gestionar Usuarios</h1>

<a href="<?=base_url?>usuario/newUsuario" class="btn btn-warning">
	Crear Usuario
</a>

<table class="table">
    <thead class="thead-dark">
	<tr>
		<th>ID</th>
		<th>NOMBRE</th>
        <th>RFC</th>
        <th>CORREO</th>
        <th>DIRECCIÓN</th>
        <th>TELEFONO</th>
        <th>WEBSITE</th>
        <th></th>
        <th></th>
	</tr>
    </thead>
	<?php while($cat = $usuarios->fetch_object()): ?>
		<tr>
			<td><?=$cat->id;?></td>
			<td><?=$cat->nombre;?></td>
            <td><?=$cat->rfc;?></td>
            <td><?=$cat->correo;?></td>
            <td><?=$cat->direccion;?></td>
            <td><?=$cat->telefono;?></td>
            <td><?=$cat->website;?></td>
            <td><a href="<?=base_url?>usuario/eliminar&id=<?=$cat->id?>">Borrar</a></td>
            <td><a href="<?=base_url?>usuario/editarUsuario&id=<?=$cat->id?>">Actualizar</a></td>
            
		</tr>
	<?php endwhile; ?>
</table>
</div>