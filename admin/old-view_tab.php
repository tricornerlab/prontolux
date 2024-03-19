<?php

if($att==1){
	$table = 'site_footers';
	$new_go = 'sectionf';
}else{
	$table = 'site_sections';	
	$new_go = 'section';	
	}

if($ref=="add"){
	if($_GET['step']=='2'){
			$id = $_GET['id'];
			$section_name = $_POST['section_name'];
			$section_file = $_POST['section_file'];
			$section_contents = $_POST['section_contents'];
                        $section_order = $_POST['section_order'];
			
			$sqlInsSect = "INSERT INTO $table(section_name,section_file,section_contents,is_shown,section_order) VALUES('$section_name','$section_file','$section_contents',1,$section_order)";
			
			
			if($queryInsSect = @mysql_query($sqlInsSect,$db_conn)){
					$show = 'Les donn&eacute;es ont &eacute;t&eacute; ajout&eacute;es'; 
				}
				
		}else{
			$show = '<h4 class="modLink">Ajouter onglet</h4><br />
			<form name="addSect" action="index.php?ref=add&go='.$new_go.'&step=2" method="post">
			<input type="text" name="section_name" style="width:300px;" /><br />
			http://<input type="text" name="section_file" style="width:285px;" /><br />
			<textarea name="section_contents" style="width:400px; height:600px;"></textarea><br /><br />
                        Ordre: <input type="text" name="section_order" /><br /><br />
			<input type="submit" name="submit" value="Ajouter" />
			</form>';
			}
	}

$sqlSections = "SELECT * FROM $table WHERE is_shown=1 AND section_id=$id";
if($querySections = @mysql_query($sqlSections, $db_conn)){
    while($resSections = mysql_fetch_array($querySections)){
        $show = '<h4>'.$resSections['section_name'].'</h4><br />
        <a class="delLink" href="index.php?ref=del&go='.$new_go.'&id='.$id.'">Effacer onglet</a><p id="sectionP">'.$resSections['section_contents'].'</p><br /><br />
		<h4 class="modLink">Modifier onglet</h4><br />
		<form name="modSect" action="index.php?ref=mod&go='.$new_go.'&id='.$id.'" method="post">
		<input type="text" name="section_title" style="width:300px;" value="'.$resSections['section_name'].'" /><br />
		http://<input type="text" name="section_file" style="width:285px;" value="'.$resSections['section_file'].'" /><br />
		<textarea name="section_contents" style="width:400px; height:600px;">'.$resSections['section_contents'].'</textarea><br /><br />
		Ordre: <input type="text" name="section_order" value="'.$resSections['section_order'].'" /><br /><br />
                <input type="submit" name="submit" value="Modifier" />
		</form>';
        }
    }

?>