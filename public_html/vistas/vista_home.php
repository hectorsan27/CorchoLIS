<div id="content_home">
	<div class="container_tablones">
		<div class="categoria">
			<img src="static/img/categoria_privados.png">
		</div>
		<div class="tablones">
			<?php
				if (count($tablones) > 0){
					for ($i=0;$i<count($tablones);$i++){?>
			<div class="tablon hvr-grow">
				<div class="descripcion" id="descripcion_1">
					<p><?php echo $tablones[$i][1];?></p>
					
				</div>
				<div class="titulo">
					<p><?php echo $tablones[$i][0];?></p>
				</div>
			</div>
			<?php } 
			} ?>
			<div class="tablon anadir_tablon hvr-grow" onclick="addBoard(<?php echo "'$correo'"; ?>)"></div> 
		</div>
	</div>
	<div class="separador">
	</div>
	<div class="container_tablones">
		<div class="categoria">
			<img src="static/img/categoria_compartidos.png">
		</div>
		<div class="tablones">
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





	
