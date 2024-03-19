<?php
session_start();
include('db_conn.php');

$sqlChars = "SELECT char_id, char_name FROM characteristics ORDER BY char_name";
if($queryChars = @mysql_query($sqlChars)){
    while($resChars = mysql_fetch_array($queryChars)){
        $characteristics[$resChars['char_id']] = $resChars['char_name'];
    }
}

foreach($characteristics as $char_id=>$char_name){
    $uff .= '<option value="'.$char_id.'">'.$char_name.'</option>';
}

echo $uff;

?>