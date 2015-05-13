
<body>
	<div id="container">
	<div id="header">
		<div id="container_logo">
			<a href="/public_html/">
				<img src="static/img/logo_provisional.png" alt="Logo">
			</a>
	    </div>
	    <div id="container_login">
	    	<ul class="lista_horizontal_inicio">
	    		<?php
					if(isset($_SESSION['correo'])):			
				?>
				<li><a id="perfil_usuario"><?php echo $_SESSION['correo'];?></a></li>
				<li class="hvr-overline-from-center"><a href="cerrar_session" id="logout">CERRAR SESSIÓN</a></li>
				<?php else: ?>
				<li class="hvr-overline-from-center"><a id="trigger_login">ACCEDER</a></li>
	       		<li class="hvr-overline-from-center"><a id="trigger_registro">REGISTRARSE</a></li>
	       		<?php endif;?>
	    	</ul>
	    </div>
	</div>
		<!-- Barra inicial de la WEB que nos permite Registrarnos, Logearnos o Cerrar Session-->		
		<div id="content_shared">
			<?php
			if(isset($_SESSION['correo'])){ ?>
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
			else{ ?>
				<div>
					<h5> Para acceder a un tablon compartio contigo debes loguearte primero.</h5>
					<h5>Si no tienes cuenta puedes registrarte en el botón de la esquina superior derecha</h5>
				</div>
			<?php } ?>
		</div>