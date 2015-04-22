<div id="content">
	<?php
	$correo = $_SESSION['logeado'];
	echo $correo;?>
	<input type="button" value='Crear' onclick="addBoard(<?php echo "'$correo'"; ?>)"/>
</div>

	

