<?php  

try 
{
    $conexion = new PDO('mysql:host=localhost;dbname=practica_paginacion', 'root', '');         //Establecemos la conexion.
    
} catch (PDOException $e) {
    echo "ERROR " . $e->getMessage();   //En caso de no poder conectar, agarramos el error para imprimirlo.
    die();                      //Matamos la ejecucion.
}

//Si la variable pagina esta seteada por $_GET entonces tomamos ese valor entero. Si no esta seteada, por defecto se setea en 1.
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;    // ? Funciona como entonces. : Funciona como else.

$articulosPorPagina = 5;     //Variable para establecer el numero de articulos que tendremos por pagina.

//Establecemos nuestro puntero para recorrer la DATABASE.
//Si estamos en una pagina mayor a 1, debemos calcular donde situar nuestro puntero para traer los 5 articulos correspondientes mediante esta ecuacion. Si estamos en la primera pagina el puntero se situa al inicio de la DATABASE.
$inicio = ($pagina>1) ? ($pagina * $articulosPorPagina - $articulosPorPagina) :0; 

//Lo que hace sera traer desde nuestro puntero $inicio y los 5 articulos siguientes.
//SQL_CALC_FOUND_ROWS nos permite saber cuantas filas hay en total en la BD.
$articulos = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM articulos LIMIT $inicio,$articulosPorPagina");     //Preparamos nuestra consulta. "" porque va con variables.

$articulos->execute();  //Ejecutamos la consulta.
$articulos= $articulos->fetchAll();    //Traemos todos los articulos y los guardamos en la variable.

if (!$articulos) 
{
    header('Location:index.php');   //En caso de no haber articulos, redireccionamos al index.
                                    //Esto hara que en caso de ingresar una pagina que no contenga articulos, se vaya directamente a la pagina 1 debido al $pagina isset.    
}

//Podemos traer FOUND_ROWS() gracias a SQL_CALC_FOUND_ROWS. Lo que hacemos es traer el total de filas que nosotros tenemos en la DATABASE.
$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total'); 
$totalArticulos = $totalArticulos->fetch()['total'];    //Sobreescribimos la variable. Escribimos asi porque se comporta como un arreglo de filas la variable total.

//Calculamos el numero de paginas con la siguiente ecuacion.
$numeroPaginas = ceil($totalArticulos / $articulosPorPagina);

//PONER AL FINAL PORQUE SINO SE ROMPE TODO.
require 'index.view.php';   //Relacionamos con el archivo de la vista. 
?>