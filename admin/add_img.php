<?php
//agregar categoria aqui
$act = $_GET['act'];
$type = $_GET['type'];
//$pid = $_GET['pid'];

if(!isset($act) || strlen($act)==0){
    
    //default
    $show = '<h3>Ajouter image</h3>
    <form name="addTable" action="index.php?ref=add&go=img&act=ins&pid='.$pid.'&type='.$type.'" method="post" enctype="multipart/form-data">
    Choisir fichier:<br />
    <input type="file" name="img_file" /><br />
    <input type="submit" name="submit" value="Ajouter" />
    </form>';
}else{
    if($act=="ins"){
		
        $img_file = $_FILES['img_file']['name'];
        
        if(!$_FILES['img_file']['error']){
            $directory = 'images'.DIRECTORY_SEPARATOR.'products'.DIRECTORY_SEPARATOR.$pid;
            if(!file_exists($directory)){
                mkdir($directory, 0705);
            }
            $img_incl_destination = 'images/products/'.$pid.'/'.$img_file;
            if(!move_uploaded_file($_FILES['img_file']['tmp_name'], $img_incl_destination)){
                $show = 'Il y a eu une erreur avec l\'image. <a href="index.php?ref=add&go=img&pid='.$pid.'&type='.$type.'">Retourner</a>';   
            }
            
            $sqlInsImg = "INSERT INTO images(img_link) VALUES('$img_incl_destination')";
            if($queryInsImg = @mysql_query($sqlInsImg,$db_conn) or die(mysql_error())){
                $sqlLast = "SELECT LAST_INSERT_ID() as img_id";
                $queryLast = @mysql_query($sqlLast,$db_conn) or die(mysql_error());
                $resLast = mysql_fetch_array($queryLast);
                $img_id = $resLast['img_id'];
                if($type == 'main'){
                    $sqlImgProd = "INSERT INTO imgs_prods(prod_id,img_id,img_is_main) VALUES($pid,$img_id,1)";
                }elseif($type == 'tech'){
                    $sqlImgProd = "INSERT INTO imgs_prods(prod_id,img_id,img_is_technique) VALUES($pid,$img_id,1)";
                }else{
                    $sqlImgProd = "INSERT INTO imgs_prods(prod_id,img_id) VALUES($pid,$img_id)";
                }
                
				
                if($queryImgProd = @mysql_query($sqlImgProd,$db_conn)){
                    $show = 'L\'image a &eacute;t&eacute; ajout&eacute;e. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
                }
                
            }
        }else{
            $show = 'Il y a eu une erreur. <a href="index.php?ref=add&go=img&pid='.$pid.'&type='.$type.'">Retourner</a>';
        }
        
        
    }
}

//luego hacer modificar


?>
