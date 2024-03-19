<?php
session_start();
include('db_conn.php');

$ProdId = $_POST['prod_id'];
$CharId = $_POST['id'];
$CharName = urldecode($_POST['name']);
$CharValue = urldecode($_POST['value']);
$CharOrder = $_POST['ord'];

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
}else{
    //buscar el char name
    $sqlCharName = "SELECT char_name FROM characteristics WHERE char_id=$CharId";
    if($queryCharName = @mysql_query($sqlCharName,$db_conn)){
        if($resCharName = mysql_fetch_array($queryCharName)){
            $CharName = $resCharName['char_name'];
        }
    }
}

$sqlProdsChars = "INSERT INTO prods_chars(prod_id, char_id, char_value, char_order) VALUES($ProdId, $CharId, '$CharValue', $CharOrder)";
if(@mysql_query($sqlProdsChars,$db_conn)){
    $response = '<b>'.$CharName.':</b> '.$CharValue.'</br>';
}
echo $response;

?>