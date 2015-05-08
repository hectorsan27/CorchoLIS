<div id="content">
		<div class="contenido_centrado">
			

			<h3>
				</div><?php
				if($_SESSION['correo']){

				echo "<form id='formulario_invitar'>
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
                </form>";
			}
			else{
			echo "Para acceder a un tablon compartio contigo debes loguearte primero, si no tienes cuenta registrate";
				}
			?>
			</h3>

			<video width="720" height="405" controls>
				<source src="static/img/video_test.mp4" type="video/mp4">
			</video>
		</div>
		<div class="contenedor_salto_abajo hvr-float">
			<a href="#presentacion" id="salto_1"><img src="static/img/salto_seleccion_abajo.png");></a>
		</div>
	