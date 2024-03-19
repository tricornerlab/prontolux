<?php

//vino sin ningun producto, asi que hay que mostrar toda la lista de categorias y sus productos.
//se hace la consulta de categorias, se agrupan por su parent_cat. cuando se termina con la consulta de todas las de un parent_cat, se hace la consulta de los productos
//ajax: separar la consulta, poner en cada cat un link que llama a la funcion que hace la consulta por todas las hijas de esa.
//verificar si viene algun parent_cat. si no viene nada, se arranca con 0; sino, se buscan todas las hijas de la elegida.
$show = '<img src="images/prods_page_head.jpg" /><br />';
$pcat = $_GET['pcat'];
if(strlen($pcat)==0 || $pcat==0){
    $pcat = 0;
    include('cur_cat.php');
    $show .= $toShow;
}


?>