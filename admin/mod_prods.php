<?php

$act = $_GET['act'];
if($act == 'basic'){
    $sqlProdData = "SELECT prod_name, prod_description, prod_order FROM products WHERE prod_id=$id";
    if($queryProdData = @mysql_query($sqlProdData, $db_conn)){
        while($resProdData = mysql_fetch_array($queryProdData)){
            $prod_name = $resProdData['prod_name'];
            $prod_description = $resProdData['prod_description'];
			$prod_order = $resProdData['prod_order'];
        }
    }
    $show = '<h4>Informations g&eacute;n&eacute;rales</h4>
    <form name="general" action="index.php?ref=mod&go=prods&act=upd_bas&id='.$id.'" method="post">
    Nom du produit:<br />
    <input type="text" name="prod_name" class="prod" value="'.$prod_name.'" /><br />
    Description du produit:<br />
    <textarea name="prod_description" class="prod">'.$prod_description.'</textarea><br />
	Ordre:<br />
    <input type="text" name="prod_order" class="prod" value="'.$prod_order.'" /><br />
    <input type="submit" name="submit" value="Continuer" />
    </form>';
    
}elseif($act == 'upd_bas'){
    $id = $_GET['id'];
    $prod_name = $_POST['prod_name'];
    $prod_description = $_POST['prod_description'];
	$prod_order = $_POST['prod_order'];
	if(strlen($prod_order)==0){
		$prod_order = 0;
		}
    $sqlUpd = "UPDATE products SET prod_name = '$prod_name', prod_description = '$prod_description', prod_order = $prod_order WHERE prod_id=$id";
    if($queryUpd = @mysql_query($sqlUpd, $db_conn) or die(mysql_error())){
       $show = 'Le produit a &eacute;t&eacute; modifi&eacute; <a href="index.php?ref=viewProd&id='.$id.'">Retourner au produit</a>'; 
    }    
}elseif($act == 'chars'){
	$id = $_GET['pid'];
	//consulta caracteristicas
	$sqlChars = "SELECT characteristics.char_id, characteristics.char_name, prods_chars.char_value FROM characteristics,prods_chars WHERE characteristics.char_id=prods_chars.char_id AND prods_chars.prod_id=$id ORDER BY prods_chars.char_order";
	if($queryChars = @mysql_query($sqlChars,$db_conn)){
		while($resChars = mysql_fetch_array($queryChars)){
			$char_id = $resChars['char_id'];
			$char_name = $resChars['char_name'];
			$char_value = $resChars['char_value'];
			$show .= '<b>'.$char_name.':</b> '.$char_value.'  <a href="index.php?ref=del&go=chars&id='.$char_id.'&pid='.$id.'" class="delLink">Effacer</a><br />';
		}
	}

//agregar nuevas
     $sqlChars = "SELECT char_id, char_name FROM characteristics ORDER BY char_name";
        if($queryChars = @mysql_query($sqlChars)){
            while($resChars = mysql_fetch_array($queryChars)){
                $characteristics[$resChars['char_id']] = $resChars['char_name'];
            }
        }

        $show .= '<div id="addedCats"></div><div id="addCatDiv"><form name="chars" action="index.php?ref=viewProd&id='.$id.'" onsubmit="addChar();" method="post">
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
        <input type="hidden" name="prod_id" id="prod_id" value="'.$id.'" />
        <input type="hidden" name="char_order" id="char_order" value="1" />
        <input type="submit" name="submit" value="Ajouter et Continuer" />
        </form></div><br /><br />
		<a href="index.php?ref=viewProd&id='.$id.'" style="text-transform:uppercase">Cliquez ici s\'il n\'y a pas de characteristiques &agrave; ajouter.</a>';
}elseif($act == 'cats'){
		$pid = $_GET['pid'];
		$show .= '<form name="catProd" action="index.php?ref=mod&go=prods&act=upd_cats&pid='.$pid.'" method="post">
		<select name="cat_id">';
		$sqlAllCats = "SELECT cat_id, cat_name FROM categories ORDER BY cat_name";
		if($queryAllCats = @mysql_query($sqlAllCats,$db_conn)){
				while($resAllCats = mysql_fetch_array($queryAllCats)){
						$show .= '<option value="'.$resAllCats['cat_id'].'">'.$resAllCats['cat_name'].'</option>';
					}
		}
		
		$show .= '
		</select>
		<input type="submit" name="submit" value="Modifier" />
		</form>
		
		<br />
		<a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
	
	}elseif($act == 'upd_cats'){
		$pid = $_GET['pid'];
		$new_cat_id = $_POST['cat_id'];
		$sqlUpdCat = "UPDATE products SET prod_category=$new_cat_id WHERE prod_id=$pid";
		if($queryUpdCat = @mysql_query($sqlUpdCat,$db_conn) or die(mysql_error())){
				$show = 'La modification a &eacute;t&eacute; faite. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
			}
	}



?>