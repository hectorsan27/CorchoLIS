<div id="content_shared">
		<?php
		if($_SESSION['correo']){ ?>

		<div id="introducir_codigo">
			<form id='formulario_invitar'>
	            <ul class='form-style-1'>
	            	<li>
	                	<label>Codigo</label>
	            	</li>
	            	<li>
	                	<input id='codigo' type='text' class='field-long' placeholder='codigo'/>
	            	</li>
	            	<li>
	                	<input class='aceptar' type='button' value='Entrar' onclick='sharedUser(1,correo.value)'/>
	            	</li>
	            </ul>
	        </form>
    	</div>

    <?php
	}

	else{?>
	<p>Para acceder a un tablon compartio contigo debes loguearte primero, si no tienes cuenta registrate</p>

	<?php
		}
	?>
</div>

