


<div class="container">
<h1>Login</h1>
<form action="<?=base_url?>Login/login" method="POST" id="basic-form">

  <div class="form-group">
    <label for="exampleInputEmail1">Correo electrónico</label>
    <input type="email" class="form-control" name="correo"  id="correo" >
  </div>

  <div class="form-group">
    <label for="password">Contraseña</label>
    <input type="password" class="form-control" name="password" id="password" >
  </div>

  <button type="submit" class="btn btn-primary" id="ingresar">Iniciar sesión</button>
</form>



<a href="<?=base_url?>Usuario/registro">Registrar</a>
<br>
<a href="<?=base_url?>Usuario/restaurarPassword">Recuperar contraseña</a>


<style>

.campo_incorrecto{
  
  border-color: red;


}


</style>

<script>

var btn = document.getElementById('ingresar');
var correo = document.getElementById('correo');
var password = document.getElementById('password');

btn.addEventListener('click', function(evt){
  

      if(correo.value === ''){

          document.getElementById('correo').classList.add('campo_incorrecto');
          console.log('el campo correo es obligatorio')
          evt.preventDefault();
          return false;

      }

      if(correo.value != ''){
        document.getElementById('correo').classList.remove('campo_incorrecto');
      }

      if(password.value === ''){

      document.getElementById('password').classList.add('campo_incorrecto');
      console.log('el campo password es obligatorio')
      evt.preventDefault();
      return false;

      }

      if(password.value != ''){
        document.getElementById('password').classList.remove('campo_incorrecto');
      }

});



</script>
