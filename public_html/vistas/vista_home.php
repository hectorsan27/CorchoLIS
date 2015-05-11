<body> <!--El Header se encarga de abrir el tab body y html pero no lo cierra-->
	<div id="container">
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
					<li class="hvr-overline-from-center"><a href="cerrar_session" id="logout">CERRAR SESSIÓN</a></li>
					<?php else: ?>
					<li class="hvr-overline-from-center"><a id="trigger_login">ACCEDER</a></li>
	        		<li class="hvr-overline-from-center"><a id="trigger_registro">REGISTRARSE</a></li>
	        		<?php endif;?>
	    		</ul>
	    	</div>
		</div>

	<div id="content_home">
		<div class="container_tablones">
			<div class="categoria">
				<img src="static/img/categoria_privados.png">
			</div>
			<div class="tablones">
				<div id="anadir_tablon_privado" class="tablon anadir_tablon hvr-grow"></div> 
				<?php
					if (count($tablones) > 0){
						for ($i=0;$i<count($tablones);$i++){?>
				<div class="tablon hvr-grow" onclick="openBoard(<?php echo "'$correo'"; ?>,<?php echo $tablones[$i][2]; ?>, '<?php echo $tablones[$i][3]; ?>')">
					<div class="descripcion" id="descripcion_1">
						<p><?php echo $tablones[$i][1];?></p>
						
					</div>
					<div class="titulo">
						<p><?php echo $tablones[$i][0]?></p>
					</div>
				</div>
				<?php } 
				} ?>
			</div>
		</div>
		<div class="separador">
		</div>
		<div class="container_tablones">
			<div class="categoria">
				<img src="static/img/categoria_compartidos.png">
			</div>
			<div class="tablones">

				<div class="tablon anadir_tablon hvr-grow"></div> 
				<?php
					if (count($tablonesComp) > 0){
						for ($i=0;$i<count($tablonesComp);$i++){?>
				<div class="tablon hvr-grow">
					<div class="descripcion" id="descripcion_1">
						<p><?php echo $tablonesComp[$i][1];?></p>
						
					</div>
					<div class="titulo">
						<p><?php echo $tablonesComp[$i][0];?></p>
					</div>
				</div>
				<?php } 
				} ?>
			</div>
		</div>
	</div>
	<div class="fondo_oscurecido">
		<div id="div_anadir_tablon">
			<div class="form-style-1-heading">CREAR TABLÓN</div>
			<form action="controladores/controlador_crear_tablon.php" method="post">
				<ul class="form-style-1">
				    <li>
				        <label>Nombre del tablón</label>
				        <input type="text" name="nombre" class="field-long" />
				    </li>
				    <li>
				        <label>Descripción</label>
				        <input type="text" name="descripcion" class="field-long" />
				    </li>
				    <li>
				        <input type="submit" value="Submit" />
				    </li>
				</ul>
			</form>
		</div>
	</div>





	
