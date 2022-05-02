<?php
      consulta();

      //Consulta y elimina en la base de datos elimina los viejas noticias
      function consulta(){
        $conn = new mysqli('localhost', 'root', '', 'proyecto2');

        $sqlEli="DELETE FROM `noticias`";
        $querEli= mysqli_query($conn,$sqlEli);
        
  
  
        //Consulta a la base de datos para llamar a los datos.
  
        $sqlCon="SELECT * FROM `nuevas_noticias`";
        $quer= mysqli_query($conn,$sqlCon);
        while($row=mysqli_fetch_array($quer)){ 
  
          $idNoti=$row['id_nue_noticas'];
          $catego=$row['categoria_id']; 
          $usuario =$row['id_usuario'];
          $rs=$row['url_rss'];
          guardar($rs,$idNoti,$usuario,$catego);
  
        }

      }
      
     


       //funcion para guardar a la base de datos
        function guardar($rss,$idNo,$usu,$categoria){
          $conn = new mysqli('localhost', 'root', '', 'proyecto2');;
          $url = "$rss";

          if(isset($_POST['submit'])){
              if($_POST['feedurl'] != ''){
                  $url = $_POST['feedurl'];
              }
          }
  
          $invalidurl = false; 
          if(@simplexml_load_file($url)){
              $feeds = simplexml_load_file($url);
          }else{
              $invalidurl = true;
              echo "URL de feed RSS incorrecto.";
              echo "No te olvides de incluir el protocolo http(s)";
          }
  
  
          $i=0;
  
          //Comprobamos si la URL está vacía. Continúa si no está vacía. De lo contrario pasa al else.
          if(!empty($feeds)){
  
  
              $site = $feeds->channel->title;
              $sitelink = $feeds->channel->link;
              foreach ($feeds->channel->item as $item) {
                  //Datos obtenidos de la noticia
                  $title = $item->title;
                  $link = $item->link;
                  $description = $item->description;
                  $postDate = $item-> pubDate;
                  $fechaFinal =date(strtotime($postDate));
                  $sql = "INSERT INTO `noticias`(`titulo`, `descripcion`, `link`, `fecha`, `id_noticia_nueva`, `usuario_id`, `categoria_id`) 
                  VALUES ('$title','$description','$link','$fechaFinal',
                  '$idNo','$usu','$categoria')";
                  $query=mysqli_query($conn,$sql);
                  if($i>=50) break;
          ?>   
                  <?php
                  $i++;
              }
          }else{
              //Error que se muestra si no hay nada que mostrar
              if(!$invalidurl){
                  echo "No se encontró nada que mostrar";
              }
          }

        }
       

    ?>