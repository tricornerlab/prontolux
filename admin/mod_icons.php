<?php
//agregar categoria aqui
$act = $_GET['act'];

if(!isset($act) || strlen($act)==0){
    //default
    
    $sqlIcons = "SELECT icons.icon_id, icons.icon_url, icons_prods.icon_value FROM icons, icons_prods WHERE icons.icon_id=icons_prods.icon_id AND icons_prods.prod_id=$pid";
    if($queryIcons = @mysql_query($sqlIcons,$db_conn) or die(mysql_error())){
        while($resIcons = mysql_fetch_array($queryIcons)){
            $icon_urls[$resIcons['icon_id']] = $resIcons['icon_url'];
            $icon_values[$resIcons['icon_id']] = $resIcons['icon_value'];
        }
    }
    
    $sqlNewIcons = "SELECT icon_id, icon_url FROM icons WHERE icon_id NOT IN(SELECT icon_id FROM icons_prods WHERE prod_id=$pid)";
    if($queryNewIcons = @mysql_query($sqlNewIcons,$db_conn)){
        while($resNewIcons = mysql_fetch_array($queryNewIcons)){
            $new_icon_urls[$resNewIcons['icon_id']] = $resNewIcons['icon_url'];
        }
    }
    
    
    $show = '<h3>Modifier icones</h3>
    <br /><a class="modLink" href="index.php?ref=mod&go=icons&act=modOrder&pid='.$pid.'">Modifier l\'ordre des icones.</a>
    <br /><a class="delLink" href="index.php?ref=mod&go=icons&act=addIcons&pid='.$pid.'">Ajouter ou effacer icones (ATTENTION: cette option efface les icones permanentement de la base de donn&eacute;s et pour la totalit&eacute; des produits! Pour effacer les icones qui s\'affichent pour un produit seulement, veuillez utiliser la page actuelle).</a><br /><br />
    <form name="modIcons" action="index.php?ref=mod&go=icons&act=upd&pid='.$pid.'" method="post">';
    if(sizeof($icon_urls)>0){
        foreach($icon_urls as $icon_id=>$icon_url){
            $show .= '<div id="singleIcon"><input name="icons[]" type="checkbox" value="'.$icon_id.'" checked="yes" /> <img src="'.$icon_url.'"><br />
            <input type="text" name="val'.$icon_id.'" value="'.$icon_values[$icon_id].'" /></div>';
        }
    }
    if(sizeof($new_icon_urls)>0){
        foreach($new_icon_urls as $new_icon_id=>$new_icon_url){
            $val_name = 'val'.$new_icon_id;
            $show .= '<div id="singleIcon"><input name="icons[]" type="checkbox" value="'.$new_icon_id.'" /> <img src="'.$new_icon_url.'"><br />
            <input type="text" name="'.$val_name.'" /></div>';
        }
    }
    
    $show .= '<input type="submit" name="submit" value="Modifier" />
    </form>';
}else{
    if($act=="upd"){
        $icons = $_POST['icons'];
        
        $sqlDel = "DELETE FROM icons_prods WHERE prod_id=$pid";
        $queryDel = @mysql_query($sqlDel,$db_conn);

		if(sizeof($icons)>0){
			$sqlIns = "INSERT INTO icons_prods(prod_id, icon_id, icon_value) VALUES";
			foreach($icons as $icon_id){
				$val_name = 'val'.$icon_id;
				$value = $_POST[$val_name];
				if(!isset($value) || strlen($value)==0){
					$value = '';
					echo 'si';
				}
				$sqlIns .= "($pid, $icon_id, '$value')";
				if($icon_id != end($icons)){
					$sqlIns .= ",";
				}
			}
			
			
			if($queryIns = @mysql_query($sqlIns,$db_conn)){
				$show .= 'Les icones ont &eacute;t&eacute; modifi&eacute;s. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a> ';
			}
		}else{
				$show .= 'Les icones ont &eacute;t&eacute; modifi&eacute;s. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a> ';
			}
    }

        
    if($act=="modOrder"){
            //consulta los que tiene cargados
        $sqlIcons = "SELECT icons.icon_id, icons.icon_url, icons_prods.icon_value, icons_prods.icon_order FROM icons, icons_prods WHERE icons.icon_id=icons_prods.icon_id AND icons_prods.prod_id=$pid";
        if($queryIcons = @mysql_query($sqlIcons,$db_conn) or die(mysql_error())){
                while($resIcons = mysql_fetch_array($queryIcons)){
                        $icon_urls[$resIcons['icon_id']] = $resIcons['icon_url'];
                        $icon_values[$resIcons['icon_id']] = $resIcons['icon_value'];
                        $icon_order[$resIcons['icon_id']] = $resIcons['icon_order'];
                }
        }
        //los imprime en una lista
        if(sizeof($icon_urls)>0){
                $show .= '<form name="iconsForm" method="post" action="index.php?ref=mod&go=icons&act=updOrder&pid='.$pid.'">';
                foreach($icon_urls as $icon_id=>$icon_url){
                        $icons[]=$icon_id;
                 $show .= '<div id="singleIcon"><img src="'.$icon_url.'" />';
                        if(strlen($icon_values[$icon_id])>0 && $icon_values[$icon_id]!=''){
                                $show .= '<br />'.$icon_values[$icon_id].'</div>';
                        }else{
                                $show .= '</div>';
                        }
                 $show .= '<input type="text" name="iconOrder_'.$icon_id.'" id="iconOrder_'.$icon_id.'" value="'.$icon_order[$icon_id].'" /> <br /><br /><br />';
                 }
                 
                 $total_icons = implode('_',$icons);
                 
                 $show .= ' <br /><br /><input type="hidden" name="total_icons" id="total_icons" value="'.$total_icons.'"><input type="submit" name="submit" value="Modifier l\'ordre des icones"></form>';
         }else{
                 $show .= "Il n'y a pas d'icones a modifier";	 
         }
    }
	
    if($act=="updOrder"){
            $total_icons = $_POST['total_icons'];
            $icon_ids = explode('_',$total_icons);
            foreach($icon_ids as $icon_id){
                    $field = 'iconOrder_'.$icon_id;
                    $icon_order = $_POST[$field];
                    
                    $sqlUpdOrder = "UPDATE icons_prods SET icon_order = $icon_order WHERE icon_id=$icon_id AND prod_id=$pid";
                    @mysql_query($sqlUpdOrder,$db_conn);
            }
                $show .= 'Les icones ont &eacute;t&eacute; modifi&eacute;es. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a> ';
    }
	
    if($act=="addIcons"){
            $sqlNewIcons = "SELECT icon_id, icon_url FROM icons";
            if($queryNewIcons = @mysql_query($sqlNewIcons,$db_conn)){
                    while($resNewIcons = mysql_fetch_array($queryNewIcons)){
                            $new_icon_urls[$resNewIcons['icon_id']] = $resNewIcons['icon_url'];
                    }
            }
            
            if(sizeof($new_icon_urls)>0){
                    $show .= '<form name="delIcons" action="index.php?ref=mod&go=icons&act=allDel&pid='.$pid.'" method="post">';
                    $show .= '<h4>Selectionnez ceux que vous voulez effacer OU </h4><br />';
                    
                    foreach($new_icon_urls as $new_icon_id=>$new_icon_url){
                            $show .= '<div id="singleIcon"><input name="icons[]" type="checkbox" value="'.$new_icon_id.'" /><img src="'.$new_icon_url.'"></div>';
                    }
                    
                    $show .= ' <br /><br /><input type="hidden" name="total_icons" id="total_icons" value="'.$total_icons.'"><input type="submit" name="submit" value="Effacer icones selectionnes"></form>';
            }
            
            $show .= '<form name="addIcons" action="index.php?ref=mod&go=icons&act=allAdd&pid='.$pid.'" method="post" enctype="multipart/form-data">
            <h4>Ajoutez nouvelle icone. </h4><br />
            Nom <input type="text" name="icon_name" /><br />
            Informations additionnelles <textarea name="icon_info"></textarea><br />
            Image <input type="file" name="icon_url" /><br />
            <input type="submit" name="submit" value="Ajouter icone"></form>'; 
            //agregar iconos	
    }
    
    if($act=="allDel"){
        $icons = $_POST['icons'];
        foreach($icons as $icon_id){
            $sqlDel = "DELETE FROM icons_prods WHERE icon_id=$icon_id";
            @mysql_query($sqlDel,$db_conn);
            $sqlDel2 = "DELETE FROM icons WHERE icon_id=$icon_id";
            @mysql_query($sqlDel2,$db_conn);
        }
        
        $show .= 'Les icones ont &eacute;t&eacute; efac&eacute;es. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a> ';
    }
    
    if($act=="allAdd"){    
        $icon_name = $_POST['icon_name'];
        $icon_info = $_POST['icon_info'];
        $icon_url = $_FILES['icon_url']['name'];
        
        
        
        
        if(!$_FILES['icon_url']['error']){
            $img_incl_destination = 'images/icons/'.$_FILES['icon_url']['name'];
            if(!move_uploaded_file($_FILES['icon_url']['tmp_name'], $img_incl_destination)){
                $show = 'Il y a eu une erreur avec l\'icone. ';   
            }else{
                //agregarla a la base de datos
                $sqlInsIcon = "INSERT INTO icons(icon_name,icon_info,icon_url) VALUES('$icon_name','$icon_info','$img_incl_destination')";
                if(@mysql_query($sqlInsIcon, $db_conn)){
                    $show .= 'L\'icone a &eacute;t&eacute; ajout&eacute;. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a> ';
                }
            }
        }
    }
}


?>
