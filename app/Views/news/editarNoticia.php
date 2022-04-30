<section>
<?php



print_r($datos);




?>

<div class="container mt-5">
    <form action="<?=base_url('/actualiazNo');?>" method="POST">

        <input type="hidden" name="id" value="<?=$datos[0]['id_nue_noticas']?>" >
        <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre"
        value="<?=$datos[0]['nombre_noti']?>">
        <input type="text" class="form-control mb-3" name="rssUrl" placeholder="Url"
            value="<?=$datos[0]['url_rss']?>">
       
        <select name="categorias" id="categorias"   >
       
           
           <!-- <option value="<//=$datos[0]['categoria_nom']?>"></option> -->
             
         
       
            
        </select>
        <br>
        <br>
        
        <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
    </form>

</div>
</section>

