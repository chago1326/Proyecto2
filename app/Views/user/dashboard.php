<section>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <form action="<?=base_url('/filtrar');?>" class="navbar-nav mr-auto"  method="POST">

    <?php
       
        
       foreach ($categori as $valores) {
      
         echo "<button id=filtro  type=submit value=\"$valores[categoria_nom]\">$valores[categoria_nom]</button>";
       }
       
     ?>
      
    </form>
    

        
      
    </ul>
    <form action="<?=base_url('/busqueda');?>" class="form-inline my-2 my-lg-0"  method="POST">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="buscar">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    <?php 
//Este es un contador para las noticias
$i=0;
//con este foreach muestro mis noticias
foreach ($mos as $row) {
    
    $title = $row['titulo'];
    $link = $row['link'];
    $description =$row['descripcion'];
    $postDate = $row['fecha'] ;
    $pubDate = date('D, d M Y',strtotime($postDate));


?>


    <!--contruimos cada una de las noticias-->
    <div class="card-group"> <!--row row-cols-1 row-cols-md-2-->
        <div class="card">


            <div class="card-body">
                <!--Título de la noticia-->
                <h2><a class="card-title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
                <span><?php echo $pubDate; ?></span>
                <!--Fecha de la publicación-->
            </div>
            <!-- Cuerpo de la noticia-->
            <div class="card-text">
                <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a
                    href="<?php echo $link; ?>">Leer más</a> <!-- botón leer más. Con enlace a la noticia-->
            </div>
        </div>

    </div>

    <?php
                $i++;
            
        }
        
    ?>

    
</section>