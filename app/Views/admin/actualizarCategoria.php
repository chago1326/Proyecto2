<section>
    <?php
    
   ?>

</div>
                 <div class="container mt-5">
                     <form action="<?=base_url('/actualizar');?>" method="POST">
                     
                                 <input type="hidden" name="id" value="<?=$datos[0]['id']?>">
                                 <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" value="<?=$datos[0]['categoria_nom']?>">
                                
                                 
                             <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
                     </form>
                     
                 </div>

</section>