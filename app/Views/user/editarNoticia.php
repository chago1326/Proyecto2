<section>


<div class="container mt-5">
    <form action="actulizarNoticia.php" method="POST">

        <input type="hidden" name="id" value="">
        <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre"
            value="">
        <input type="text" class="form-control mb-3" name="rssUrl" placeholder="Url"
            value="">
       
        <select name="categorias" id="categorias"   >
            
        </select>
        <br>
        <br>
        
        <input type="submit" class="btn btn-primary btn-block" value="Guardar Cambios">
    </form>

</div>
</section>