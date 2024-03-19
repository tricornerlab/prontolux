<?php
//agregar categoria aqui
$act = $_GET['act'];

if(!isset($act) || strlen($act)==0){
    //default
    $show = '<h3>Ajouter fichier</h3>
    <form name="addTable" action="index.php?ref=add&go=table&act=ins&pid='.$pid.'" method="post" enctype="multipart/form-data">
    Titre:<br />
    <input type="text" name="table_name" /><br />
    Descrption:<br />
    <input type="text" name="table_desc" /><br />
    Choisir fichier:<br />
    <input type="file" name="table_file" /><br />
    <input type="submit" name="submit" value="Ajouter" />
    </form>
    <br /><br />
    <h3>Ajouter donn&eacute;es</h3>
    <a class="addLink" href="#">Ajouter un tableau &agrave; la base de donn&eacute;s</a>
    ';
}else{
    if($act=="ins"){
        $table_name = $_POST['table_name'];
        $table_desc = $_POST['table_desc'];
        $table_file = $_FILES['table_file']['name'];
        
        if(!$_FILES['table_file']['error']){
            $img_incl_destination = 'tables/'.$table_file;
            if(!move_uploaded_file($_FILES['table_file']['tmp_name'], $img_incl_destination)){
                $show = 'Il y a eu une erreur avec le tableau. <a href="index.php?ref=add&go=table&pid='.$pid.'">Retourner</a>';   
            }
            
            $sqlInsTab = "INSERT INTO tables_price(table_name, table_description, table_file) VALUES('$table_name','$table_desc','$img_incl_destination')";
            if($queryInsTab = @mysql_query($sqlInsTab,$db_conn) or die(mysql_error())){
                $sqlLast = "SELECT LAST_INSERT_ID() as table_id";
                $queryLast = @mysql_query($sqlLast,$db_conn) or die(mysql_error());
                $resLast = mysql_fetch_array($queryLast);
                $table_id = $resLast['table_id'];
                $sqlTabProd = "INSERT INTO tables_prods(prod_id,table_id) VALUES($pid,$table_id)";
                
                if($queryTabProd = @mysql_query($sqlTabProd,$db_conn)){
                    $show = 'Le tableau a &eacute;t&eacute; ajout&eacute;. <a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
                }
                
            }
        }else{
            $show = 'Il y a eu une erreur. <a href="index.php?ref=add&go=table&pid='.$pid.'">Retourner</a>';
        }
        
        
    }
}

//luego hacer modificar


?>
