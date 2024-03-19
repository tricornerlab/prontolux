<?php

if($att==1){
	$table = 'site_footers';
}else{
	$table = 'site_sections';		
	}

$id = $_GET['id'];
$section_title = $_POST['section_title'];
$section_file = $_POST['section_file'];
$section_order = $_POST['section_order'];
$section_contents = $_POST['section_contents'];

$sqlInsSect = "UPDATE $table SET section_name='$section_title', section_file='$section_file', section_contents='$section_contents', section_order=$section_order WHERE section_id=$id";
if($queryInsSect = @mysql_query($sqlInsSect,$db_conn)){
		$show = 'Les donn&eacute;es ont &eacute;t&eacute; modifi&eacute;es'; 
	}else{
		echo $sqlInsSect;
		}

?>