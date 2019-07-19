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
        <h1>Articulos</h1>

        <section class="articulos">     <?php //Colocamos diferentes secciones. ?>
              <ul>
                 <li>1.- Articulo1</li>
                 <li>2.- Articulo2</li>      <?php  //Listamos los articulos ?>
                 <li>3.- Articulo3</li>      
                 <li>4.- Articulo4</li>
                <li>5.- Articulo5</li>
             </ul>
        </section>

        <section class="paginacion">
        <ul>
            <li class="disabled">&laquo;</li>    <?php //&laquo; l significa left o right y quo significa quotation. Es la flechita para retroceso o avance. ?>
            <li class="active"><a href="#">1</a></li>  <?php //Enlaces. ?>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&raquo;</a></li>
        </ul>
        
        
        </section>

    </div>
</body>
</html>