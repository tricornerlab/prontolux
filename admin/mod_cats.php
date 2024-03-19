<?php
//agregar categoria aqui
$act = $_GET['act'];

if(!isset($act) || strlen($act)==0){
    //default
    
    $sqlCatData = "SELECT cat_name, img_url, cat_order, parent_cat_id FROM categories WHERE cat_id=$id";
    if($queryCatData = @mysql_query($sqlCatData,$db_conn)){
        while($resCatData = mysql_fetch_array($queryCatData)){
            $cat_name = $resCatData['cat_name'];
            $img_url = $resCatData['img_url'];
            $cat_order = $resCatData['cat_order'];
            $parent_cat_id = $resCatData['parent_cat_id'];
        }
    }
    
    $show = '<h3>Modifier cat&eacute;gorie</h3>
    <form name="modCat" action="index.php?ref=mod&go=cats&act=upd&id='.$id.'" method="post" enctype="multipart/form-data">
    Cat&eacute;gorie:<br /><input name="cat_name" type="text" value="'.$cat_name.'" /><br />
    Ordre:<br /><input name="cat_order" type="text" value="'.$cat_order.'" /><br />';
    if($parent_cat_id != 0){
        $show .= '<img src="'.$img_url.'" class="catLink" /><br />
    Pour remplacer, veuillez choisir une image &agrave; t&eacute;l&eacute;charger<br />
    <input type="file" name="cat_img" /><br />';
    }
    $show .= '<input type="submit" name="submit" value="Modifier" />
    </form>';
}else{
    if($act=="upd"){
        $cat_name = $_POST['cat_name'];
        $cat_order = $_POST['cat_order'];
        $cat_img = $_FILES['cat_img']['name'];

        if(strlen($cat_order==0)){
            $cat_order = 1;
        }
        $level = $_POST['level'];
        if(isset($_FILES['cat_img']) && $_FILES['cat_img']['name']!=''){
            if(!$_FILES['cat_img']['error']){
                $img_incl_destination = 'images/categories/'.$cat_img;
                if(!move_uploaded_file($_FILES['cat_img']['tmp_name'], $img_incl_destination)){
                    $show = 'Il y a eu une erreur avec l\'image. <a href="index.php?ref=mod&go=cats&id='.$id.'">Retourner</a>';   
                }
                
                $sqlUpdCat = "UPDATE categories SET cat_name='$cat_name', cat_order=$cat_order, img_url='$img_incl_destination' WHERE cat_id=$id";
            }else{
                $show = 'Il y a eu une erreur. <a href="index.php?ref=mod&go=cats&id='.$id.'">Retourner</a>';
            }
        }else{
            $sqlUpdCat = "UPDATE categories SET cat_name='$cat_name', cat_order=$cat_order WHERE cat_id=$id";
        }
        
        if($queryUpdCat = @mysql_query($sqlUpdCat,$db_conn) or die(mysql_error())){
            $show = 'La classification a &eacute;t&eacute; modifi&eacute;e';
        }
        
    }
}

//luego hacer modificar


?>
