	
<body> <!--El Header se encarga de abrir el tab body y html pero no lo cierra-->
	<div id="container_tos">
	<!-- Barra inicial de la WEB que nos permite Registrarnos, Logearnos o Cerrar Session-->
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
					<li class="hvr-overline-from-center"><a href="/public_html/home">HOME</a></li>
					<li class="hvr-overline-from-center"><a href="cerrar_session" id="logout">CERRAR SESSIÓN</a></li>
					<?php else: ?>
					<!--<li class="hvr-overline-from-center"><a href="tablon">TESTEO DE TABLA</a></li>-->
					<li class="hvr-overline-from-center"><a id="trigger_login">ACCEDER</a></li>
	        		<li class="hvr-overline-from-center"><a id="trigger_registro">REGISTRARSE</a></li>
	        		<?php endif;?>
	    		</ul>
	    	</div>
		</div>

		<div class="info" id="tos">
					<ul>
					<li>
						<h4>Terminos de uso</h4>
						<h5>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</h5>
					</li>
					<li>
						<h4>Más terminos de uso</h4>
						<h5>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas "Letraset", las cuales contenian pasajes de Lorem Ipsum, y más recientemente con software de autoedición, como por ejemplo Aldus PageMaker, el cual incluye versiones de Lorem Ipsum.</h5>
					</li>
				</ul>
			</div>