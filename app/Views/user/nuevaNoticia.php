

<section>
<form action=""  method="Post" name="formDatosPersonales">
	
	<label for="nombre">Nombre de la Noticia</label>
	<input type="text" name="nombre"  id="nombre" placeholder="Escribe el nombre de la Noticia" required/>
	<!--<input hidden type="text" class="form-control mb-3" name="idCedula" 
                value=" "> --> 
                <br>
	<label for="rss">RSS URL</label>
	<input type="text" name="rss" id="rss" placeholder="Indruzca el RSS URL" required/>
    <br>

	<label for="categorias">Categoria</label>
	<select name="categorias" id="categorias">
	</select>
	<br>
    
	<input type="submit" name="enviar" value="Guardar Datos"/>


</form>



</section>

