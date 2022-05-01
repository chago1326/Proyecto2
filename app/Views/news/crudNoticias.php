<section>
    <div class=" container mt-5 ">
        <div class="col-md-8">
            <table class="table">
                <thead class="table-success table-striped">


                    <tr>
                        <th hidden>Id</th>
                        <th>Nombres</th>
                        <th hidden>Rss</th>
                        <th>Categoria</th>
                        <th hidden>Usario</th>
                    </tr>
                </thead>
                <?php
            
              foreach ($datos as $row) { ?>
                <tr>
                    <th hidden><?php  echo $row['id_nue_noticas']?></th>
                    <th><?php  echo $row['nombre_noti']?></th>
                    <th hidden><?php  echo $row['url_rss']?></th>
                    <th><?php  echo $row['categoria_nom']?></th>
                    <th hidden><?php  echo $row['id_usuario']?></th>
                    <th><a href="<?php echo base_url(['news','editarNo',$row['id_nue_noticas']]);?>"
                            class="btn btn-info">Editar</a>
                    </th>
                    <th><a href="<?php echo base_url(['news','borrarNo',$row['id_nue_noticas']]);?>"
                            class="btn btn-danger">Eliminar</a></th>
                </tr>

                <?php } ?>


            </table>
        </div>
    </div>
    </div>
</section>