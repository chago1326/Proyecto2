<section>


    <div class=" container mt-5 ">
        <div class="row">

            <div class="col-md-3">
                <h1>Ingrese la informacion de las categorias</h1>
                <form action="<?=base_url('/ingresarCategorias');?>" method="POST">
                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres" required>


                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </form>
            </div>

            <div class="col-md-8">
                <table class="table">
                    <thead class="table-success table-striped">
                        <tr>
                            <th hidden>Id</th>
                            <th>Nombres</th>

                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
            <?php
            //arreglar el foreach
              foreach ($newssources as $source) { ?>
                <tr>
                  <td><?php echo $source['id'] ?></td>
                  <td><?php echo $source['nombre'] ?></td>
                  
                  <td>
                    <a class="btn btn-secondary" href="<?php echo base_url(['newssource','edit',$source['id']]);?>">Edit</a>
                    <a class="btn btn-danger" href="<?php echo base_url(['newssource','delete',$source['id']]);?>">Delete</a>
                  </td>
                </tr>
            <?php } ?>
          </tbody>
                    
                        
                </table>
            </div>
        </div>
    </div>

</section>