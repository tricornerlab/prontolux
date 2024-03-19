<?php
//agregar categoria aqui
$act = $_GET['act'];
$pcat = $_GET['pcat'];
$lvl = $_GET['lvl'];

if(!isset($act) || strlen($act)==0){
    //default
    $show = '<h3>Ajouter cat&eacute;gorie</h3>
    <form name="addCat" action="index.php?ref=add&go=cats&act=ins" method="post" enctype="multipart/form-data">
    Cat&eacute;gorie:<br /><input name="cat_name" type="text" /><br />
    Ordre:<br /><input name="cat_order" type="text" /><br />
    <input type="file" name="cat_img" /><br />
    <input type="hidden" name="parent_cat_id" value="'.$pcat.'" />
    <input type="hidden" name="level" value="'.$lvl.'" />
    <input type="submit" name="submit" value="Ajouter" />
    </form>';
}else{
    if($act=="ins"){
        $cat_name = $_POST['cat_name'];
        $parent_cat_id = $_POST['parent_cat_id'];
        $cat_order = $_POST['cat_order'];
        $cat_img = $_FILES['cat_img']['name'];

        if(strlen($cat_order==0)){
            $cat_order = 1;
        }
        $level = $_POST['level'];
        
        if(!$_FILES['cat_img']['error']){
            $img_incl_destination = 'images/categories/'.$cat_img;
            if(!move_uploaded_file($_FILES['cat_img']['tmp_name'], $img_incl_destination)){
                $show = 'Il y a eu une erreur avec l\'image. <a href="index.php?ref=add&go=cats&pcat='.$parent_cat_id.'&lvl='.$level.'">Retourner</a>';   
            }
            
            $sqlInsCat = "INSERT INTO categories(cat_name, cat_level, parent_cat_id, cat_order, img_url) VALUES('$cat_name',$level,$parent_cat_id, $cat_order,'$img_incl_destination')";
            if($queryInsCat = @mysql_query($sqlInsCat,$db_conn) or die(mysql_error())){
                $show = 'La classification a &eacute;t&eacute; cr&eacute;e';
            }
        }else{
            $show = 'Il y a eu une erreur. <a href="index.php?ref=add&go=cats&pcat='.$parent_cat_id.'&lvl='.$level.'">Retourner</a>';
        }
        
        
    }
}

//luego hacer modificar


?>
