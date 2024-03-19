<?php
session_start();
$step = $_GET['step'];

if(!isset($step) || $step == 0){
    //show info general
    $prod_category = $_GET['cat'];
    
    $show = '<h4>Informations g&eacute;n&eacute;rales</h4>
    <form name="general" action="index.php?ref=add&go=prods&step=1" method="post" enctype="multipart/form-data">
    Nom du produit:<br />
    <input type="text" name="prod_name" class="prod" /><br />
    Description du produit:<br />
    <textarea name="prod_description" class="prod"></textarea><br />
    <input type="hidden" name="prod_category" value="'.$prod_category.'" />
    Image principale: <input type="file" name="img_file" /><br />
	Ordre:<br />
    <input type="text" name="prod_order" class="prod" value="'.$prod_order.'" /><br />
    <input type="submit" name="submit" value="Continuer" />
    </form>';
}

if($step == 1){
    //add info gral
    $prod_name = $_POST['prod_name'];
    $prod_description = $_POST['prod_description'];
    $prod_category = $_POST['prod_category'];
    $img_file = $_FILES['img_file']['name'];
    $prod_order = $_POST['prod_order'];
	
    $sqlStep1 = "INSERT INTO products(prod_name, prod_description, prod_category, prod_order) VALUES('$prod_name', '$prod_description', '$prod_category', $prod_order)";
    if($queryStep1 = @mysql_query($sqlStep1, $db_conn)){
        //show chars
        $sqlProdId = "SELECT LAST_INSERT_ID()";
        if($queryProdId = @mysql_query($sqlProdId,$db_conn)){
            if($resProdId = mysql_fetch_array($queryProdId)){
                $prod_id = $resProdId[0];
            }
        }
        
        if(!$_FILES['img_file']['error']){
            $img_incl_destination = 'images/products/'.$_FILES['img_file']['name'];
            if(!move_uploaded_file($_FILES['img_file']['tmp_name'], $img_incl_destination)){
                $sqlError = "DELETE FROM products WHERE prod_id=$sqlProdId";
                @mysql_query($sqlError,$db_conn);
                $show = 'Il y a eu une erreur avec l\'image';   
            }else{
                //agregarla a la base de datos
                $image_name = substr($_FILES['img_file']['name'],0,-4);
                $sqlInsImg = "INSERT INTO images(img_name,img_link) VALUES('$image_name','$img_incl_destination')";
                if(@mysql_query($sqlInsImg, $db_conn)){
                    $sqlImgId = "SELECT LAST_INSERT_ID()";
                    if($queryimgId = @mysql_query($sqlImgId,$db_conn)){
                        if($resImgId = mysql_fetch_array($queryimgId)){
                            $img_id = $resImgId[0];
                            $sqlImgsProds = "INSERT INTO imgs_prods(prod_id, img_id, img_is_main) VALUES($prod_id, $img_id, 1)";
                            $queryImgsProds = @mysql_query($sqlImgsProds,$db_conn);
                        }
                    }
                }
            }
        }
        
        $sqlChars = "SELECT char_id, char_name FROM characteristics ORDER BY char_name";
        if($queryChars = @mysql_query($sqlChars)){
            while($resChars = mysql_fetch_array($queryChars)){
                $characteristics[$resChars['char_id']] = $resChars['char_name'];
            }
        }

        $show = '
        <div id="addedCats"></div><div id="addCatDiv"><form name="chars" action="index.php?ref=viewProd&id='.$prod_id.'" onsubmit="addChar();" method="post">
        <div id="allChars">
        <select id="char_id" name="char_id" onchange="checkSel();">';
        if(sizeof($characteristics)>0){
           foreach($characteristics as $char_id=>$char_name){
             $show .= '<option value="'.$char_id.'">'.$char_name.'</option>';
            }
            $show .= '<option value="new">Ajouter charact&eacute;ristique</option></select>
        <div id="newCharDiv"></div>
        <br />';
        }else{
            $show .= '<option value="new">Ajouter charact&eacute;ristique</option></select>
        <div id="newCharDiv"><input type="text" class="prod" name="char_name" id="char_name" /></div>
        <br />';
        }
        
        $show .= 'Valeur<br />
        <textarea class="prod" id="char_value" name="char_value"></textarea><br />
        </div><br />
        <a href="#" onclick="addChar();">Ajouter nouvelle charact&eacute;ristique</a><br /><br />
        <input type="hidden" name="prod_id" id="prod_id" value="'.$prod_id.'" />
        <input type="hidden" name="char_order" id="char_order" value="1" />
        <input type="submit" name="submit" value="Ajouter et Continuer" />
        </form></div><br /><br />
		<a href="index.php?ref=viewProd&id='.$prod_id.'" style="text-transform:uppercase">Cliquez ici s\'il n\'y a pas de characteristiques &agrave; ajouter.</a>';
    }
    
    
}

if($step == 2){
    //add last characteristic
    $ProdId = $_POST['prod_id'];
    $CharId = $_POST['char_id'];
    $CharName = $_POST['char_name'];
    $CharValue = $_POST['char_value'];
    $CharOrder = $_POST['char_order'];
    
    if(strlen($CharValue)>0){
        if($CharId == 'new'){
            $sqlNewChar = "INSERT INTO characteristics(char_name) VALUES('$CharName')";
            if(@mysql_query($sqlNewChar,$db_conn)){
                $sqlCharId = "SELECT LAST_INSERT_ID()";
                if($queryCharId = @mysql_query($sqlCharId,$db_conn)){
                    if($resCharId = mysql_fetch_array($queryCharId)){
                        $CharId = $resCharId[0];
                    }
                }
            }
        }
        $sqlProdsChars = "INSERT INTO prods_chars(prod_id, char_id, char_value, char_order) VALUES($ProdId, $CharId, '$CharValue', $CharOrder)";
        if(@mysql_query($sqlProdsChars,$db_conn)){
            header('location:index.php?ref=viewProd&id='.$ProdId);
        }
    }
    //show options
}

?>