<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Paginacion</title>
    <link rel="stylesheet" href="estilos.css">
    <style>@import url('https://fonts.googleapis.com/css?family=Oswald:300,400,700&display=swap');</style>

</head>
<body>
    <div class="contenedor">
        <h1>Articulos</h1>  <?php //Ver porque el css naranja no se aplica. ?>

        <section class="articulos">     <?php //Colocamos diferentes secciones. ?>
              <ul>
                    <?php foreach ($articulos as $articulo): //$articulos es el array de articulos de nustro index. Es la consulta que preparamos ?>
                        <li><?php echo $articulo['id'] . '.- ' . $articulo['nombre']?></li>
                    <?php endforeach; ?>  
             </ul>
        </section>

        <section class="paginacion">
            <ul>

                <?php if($pagina == 1): //Si estamos en la pagina 1, deshabilitamos la flecha a la izquierda.?>
                    <li class="disabled">&laquo;</li>  <?php //&laquo; l significa left o right y quo significa quotation. Es la flechita para retroceso o avance. ?>
                <?php else: //Si no estamos en la pagina 1 entonces habilitamos la flecha para atras. Al hacer click tomara el valor de $pagina-1 osea, la pagina anterior a donde estamos parados.?>
                    <li><a href="?pagina=<?php echo $pagina-1?>">&laquo;</a></li> <?php //La etiqueta a sirve de enlace hacia la pagina anterior. ?>
                <?php endif; ?>
    
             <?php 
                    for ($i=1 ; $i <= $numeroPaginas   ; $i++ ) 
                    { 
                        if($pagina == $i)
                        {
                            echo "<li class='active'><a href='?pagina=$i'>$i</a></li>";
                        }
                        else 
                        {
                            echo "<li><a href='?pagina=$i'>$i</a></li>";   
                        }
                    }
            
             ?>


                <?php if($pagina == $numeroPaginas): //Si estamos en la pagina 1, deshabilitamos la flecha a la derecha.?>
                    <li class="disabled">&raquo;</li>  <?php //&laquo; l significa left o right y quo significa quotation. Es la flechita para retroceso o avance. ?>
                <?php else: //Si no estamos en la pagina 5 entonces habilitamos la flecha para la derecha. Al hacer click tomara el valor de $pagina-1 osea, la pagina anterior a donde estamos parados.?>
                    <li><a href="?pagina=<?php echo $pagina+1?>">&raquo;</a></li> <?php //La etiqueta a sirve de enlace hacia la pagina anterior. ?>
                <?php endif; ?> 

            </ul>
        </section>
    </div>
</body>
</html>