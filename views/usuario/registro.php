

<div class="container">
<h1>Registrarse</h1>
<form action="<?=base_url?>usuario/save" method="POST" class="formulario" id="formulario">

<label for="nombre" class="labelnombre">Nombre</label>
<div class="form-group formularioGrupo" id="grupo_nombre">
	<input type="text" name="nombre"  class="form-control" />
</div>

	<label for="rfc">Rfc</label>
	<div class=" form-group formularioGrupo" id="grupo_rfc">
		<input type="text" name="rfc"  class="form-control" maxlength="13"/>
	</div>

	<label for="correo">Correo</label>
	<div class="form-group formularioGrupo" id="grupo_correo">
		<input type="email" name="correo"  class="form-control" />
	</div>
	
	<label for="password">Contraseña</label>
	<div class="form-group formularioGrupo" id="grupo_password">
		
		<input type="password" name="password" id="password"  class="form-control" />
	</div>

	<label for="confirmarPassword">Confirmar contraseña</label>
	<div class="formularioGrupo form-group" id="grupo_confirmarPassword">
		<input type="password" name="confirmarPassword" id="confirmarPassword"  class="form-control"/>
		<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
	</div>
	<button type="submit" class="btn btn-primary" id="registrar">Registrarse</button>
	
</form>
</div>

<style>
.formulario__grupo-incorrecto{
	border:1px solid red;
	
}

.formulario__grupo-correcto{
	
}

.formulario__input-error {
	font-size: 12px;
	margin-bottom: 0;
	display: none;
}


</style>

<script>
	var btn = document.getElementById('registrar');

	const formulario = document.getElementById('formulario');
	const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/, // 7 a 14 numeros.
	rfc: /^([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d])$/
	
}

// parametros
const campos = {
	nombre: false,
	password: false,
	correo: false,
	telefono: false,
	rfc: false
}


// Validar campos


const validarFormulario = (e) => {
	switch (e.target.name) {
		
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "confirmarPassword":
			validarPassword2();
		break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
		break;

		case "rfc":
			validarCampo(expresiones.rfc, e.target, 'rfc');
		break;
		
	}
}


const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-correcto');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo_${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo_${campo}`).classList.remove('formulario__grupo-correcto');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('confirmarPassword');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo_confirmarPassword`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo_confirmarPassword`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo_confirmarPassword .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo_confirmarPassword`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo_confirmarPassword`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo_confirmarPassword .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}


//form
inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});



//event 

</script>
