<section>
<form action="<?=base_url('guardarNo')?>"  method="Post" name="">
	
	<label for="nombre">Nombre de la Noticia</label>
	<input type="text" name="nombre" class="form-control mb-3"  id="nombre" placeholder="Escribe el nombre de la Noticia" required/>
	
                <br>
	<label for="rss">RSS URL</label>
	<input type="text" name="rss" id="rss" class="form-control mb-3" placeholder="Indruzca el RSS URL" required/>
    <br>
	<select name="categorias" id="categorias" class="form-control mb-3" >
		
		<?php
	     
		foreach ($datos as $valores) {
			echo "<option value=\"$valores[id]\">$valores[categoria_nom]</option>";
			
		}
	  ?>
	</select>
	<br>
    
	<input type="submit" name="enviar" class="btn btn-primary btn-block" value="Guardar Datos"/>


</form>



</section>

