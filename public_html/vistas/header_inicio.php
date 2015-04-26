<!DOCTYPE html>
<html>
<head>
<title>CorchoLIS</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF8" /> 
<!-- LINKS -->
<link rel="stylesheet" href="static/css/style_inicio.css" type="text/css"> <!-- Estilo de la página inicial-->
<link rel="stylesheet" href="static/css/style_home.css" type="text/css"> <!-- Estilo de la página home-->
<link rel="stylesheet" href="static/css/kickstart.css" media="all" /> <!-- KICKSTART -->
<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<!--SCRIPTS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="static/js/kickstart.js"></script> <!-- KICKSTART -->
<script type="text/javascript" src="static/js/openLogin.js"></script>
<script type="text/javascript" src="static/js/validacion_registro.js"></script>
<script type="text/javascript" src="static/js/functionDrag.js"></script>
<script type="text/javascript" src="static/js/funciones_home.js"></script>
<script type="text/javascript" src="static/js/jquery.dotdotdot.js"></script> <!--Usado en home-->
<script type="text/javascript" src="static/js/funciones_inicio.js"></script>
</head> 

<body> <!--El Header se encarga de abrir el tab body y html pero no lo cierra-->
	<div id="container">
	<!-- Barra inicial de la WEB que nos permite Registrarnos, Logearnos o Cerrar Session-->
		<div id="header">
			<div id="container_logo">
				<a href="">
					<img src="static/img/logo_provisional.png" alt="Logo">
				</a>
	    	</div>
	    	<div id="container_login">
	    		<ul class="lista_horizontal lista_login">
	    			<?php
						session_start();
						if(isset($_SESSION['logeado'])):			
					?>
					<li><a id="perfil_usuario"><?php echo $_SESSION['logeado'];?></a></li>
					<li class="hvr-overline-from-center"><a href="cerrar_session" id="logout">CERRAR SESSIÓN</a></li>
					<?php else: ?>
					<li class="hvr-overline-from-center"><a href="tablon">TESTEO DE TABLA</a></li>
					<li class="hvr-overline-from-center"><a id="trigger_login">ACCEDER</a></li>
	        		<li class="hvr-overline-from-center"><a id="trigger_registro">REGISTRARSE</a></li>
	        		<?php endif;?>
	    		</ul>
	    	</div>
		</div>

		<!-- Formulario de registro. Esta escondido gracias a jQuery hasta que alguien pulsa el boton de registro-->
		<div id="div_registro" class="div_login_y_registro div_registro">
			<form class="vertical" action="controladores/controlador_registro.php"  method="post">
				<fieldset>
					<p>Registrarse</p>

					<label id="lab_correo">Correo electrónico</label>
					<input type="text" name="fr_correo" id="fr_correo">

					<label id="lab_nombre">Nombre y Apellidos</label>
					<input type="text" name="fr_nombre" id="fr_nombre">

					<label id="lab_nacimiento">Fecha de nacimiento</label>
					<input type="date" name="fr_nacimiento" id="fr_nacimiento">

					<label id="lab_provincia">Provincia</label>
					<select name="fr_provincia" id="fr_provincia">
							<option value='Default'>Seleccionar</option>
							<option value='Álava'>Álava</option>
							<option value='Albacete'>Albacete</option>
							<option value='Alicante/Alacant'>Alicante/Alacant</option>
							<option value='Almería'>Almería</option>
							<option value='Asturias'>Asturias</option>
							<option value='Ávila'>Ávila</option>
							<option value='Badajoz'>Badajoz</option>
							<option value='Barcelona'>Barcelona</option>
							<option value='Burgos'>Burgos</option>
							<option value='Cáceres'>Cáceres</option>
							<option value='Cádiz'>Cádiz</option>
							<option value='Cantabria'>Cantabria</option>
							<option value='Castellón/Castelló'>Castellón/Castelló</option>
							<option value='Ceuta'>Ceuta</option>
							<option value='Ciudad Real'>Ciudad Real</option>
							<option value='Córdoba'>Córdoba</option>
							<option value='Cuenca'>Cuenca</option>
							<option value='Girona'>Girona</option>
							<option value='Las Palmas'>Las Palmas</option>
							<option value='Granada'>Granada</option>
							<option value='Guadalajara'>Guadalajara</option>
							<option value='Guipúzcoa'>Guipúzcoa</option>
							<option value='Huelva'>Huelva</option>
							<option value='Huesca'>Huesca</option>
							<option value='Illes Balears'>Illes Balears</option>
							<option value='Jaén'>Jaén</option>
							<option value='A Coruña'>A Coruña</option>
							<option value='La Rioja'>La Rioja</option>
							<option value='León'>León</option>
							<option value='Lleida'>Lleida</option>
							<option value='Lugo'>Lugo</option>
							<option value='Madrid'>Madrid</option>
							<option value='Málaga'>Málaga</option>
							<option value='Melilla'>Melilla</option>
							<option value='Murcia'>Murcia</option>
							<option value='Navarra'>Navarra</option>
							<option value='Ourense'>Ourense</option>
							<option value='Palencia'>Palencia</option>
							<option value='Pontevedra'>Pontevedra</option>
							<option value='Salamanca'>Salamanca</option>
							<option value='Segovia'>Segovia</option>
							<option value='Sevilla'>Sevilla</option>
							<option value='Soria'>Soria</option>
							<option value='Tarragona'>Tarragona</option>
							<option value='Santa Cruz de Tenerife'>Santa Cruz de Tenerife</option>
							<option value='Teruel'>Teruel</option>
							<option value='Toledo'>Toledo</option>
							<option value='Valencia/Valéncia'>Valencia/Valéncia</option>
							<option value='Valladolid'>Valladolid</option>
							<option value='Vizcaya'>Vizcaya</option>
							<option value='Zamora'>Zamora</option>
							<option value='Zaragoza'>Zaragoza</option>
						</select>
					<label id="lab_password">Password</label>
					<input type="password" name="fr_password" id="fr_password">
					<button type="submit" id="submit_registro" class="submit" value="Registrarse">Registrarse</button>
				</fieldset>
			</form>
		</div>

		<!-- Formulario de Login. Esta escondido gracias a jQuery hasta que alguien pulsa el boton de registro-->

		<div id="div_login" class="div_login_y_registro div_login">
			<form class="vertical" action="controladores/controlador_login.php" method="post">
				<fieldset>
					<p>Inicio de Sesión</p>
					<label>Correo electrónico</label>
					<input type="text" name="fl_correo">
					<label>Password</label>
					<input type="password" name="fl_password">
					<button type="submit" id="submit_login" class="submit">Iniciar Sesión</button>
				</fieldset>
			</form>
		</div>
