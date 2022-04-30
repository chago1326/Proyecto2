<section>

<?php 

foreach ($datos as $row) {
    
    $title = $row['titulo'];
    $link = $row['link'];
    $description =$row['descripcion'];
    $postDate = $row['fecha'] ;
    $pubDate = date('D, d M Y',strtotime($postDate));
}

?>
    <!--contruimos cada una de las noticias-->
    <div class="post">
        <div class="post-head">
            <!--Título de la noticia-->
            <h2><a class="feed_title" href="<?php echo $link; ?>"><?php echo $title; ?></a></h2>
            <span><?php echo $pubDate; ?></span> <!--Fecha de la publicación-->
        </div>
        <!-- Cuerpo de la noticia-->
        <div class="post-content">
            <?php echo implode(' ', array_slice(explode(' ', $description), 0, 20)) . "..."; ?> <a href="<?php echo $link; ?>">Leer más</a> <!-- botón leer más. Con enlace a la noticia-->
        </div>
    </div>

    <?php
    $i++;

  ?>

  
</section>