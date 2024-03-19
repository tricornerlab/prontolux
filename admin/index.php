<?php
session_start();
include("db_conn.php");

$ref = $_GET['ref'];
$go = $_GET['go'];

if(!isset($_SESSION['user_id'])){
    $go = 'login';
}

$extra = '';

//si abren el home, que pida el login
if(strlen($ref)==0 && strlen($go)==0 && !isset($_SESSION['user_id'])){
    $go = 'login';
}elseif(strlen($ref)==0 && strlen($go)==0 && isset($_SESSION['user_id'])){
//si lo abren y esta aun loggeado, va a la pag principal
    $go = 'main';
}else{
//sino, si viene un ref o un go, ver cada caso
    switch($ref){
        case 'verifyLogin':
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sqlLogin = "SELECT user_id, name FROM users WHERE username='$username' AND password='$password' AND admin=1";
            if($queryLogin = @mysql_query($sqlLogin,$db_conn)){
                while($resLogin = mysql_fetch_array($queryLogin)){
                    $user_id = $resLogin['user_id'];
                    $name = $resLogin['name'];
                }
                
                if($user_id!=null AND $user_id!=0){
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['name'] = $name;
                }           
            }
            $go = 'main';
        break;
    
        case 'logOut':
            session_unset();
            session_destroy();
            header('location:index.php?go=login');           
        break;
    
        case 'add':
            if($go == 'users'){
                $username = $_POST['username'];
                $password = $_POST['password'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $sqlAdd = "INSERT INTO users(username, password, name, email, admin) VALUES('$username', '$password', '$name', '$email', 1)";
            }
            
            if($go == 'cats'){
                include('categories.php');
            }
			
			if($go == 'section'){
				$att = 0;
                include('view_tab.php');
            }
			
			
			if($go == 'sectionf'){
				$att = 1;
                include('view_tab.php');
            }
            
            if($go == 'prods'){
                include('add_prod.php');
                $extra = '<script type="text/javascript" src="scriptsPlus.js"></script>';
            }
            
            if($queryAdd = @mysql_query($sqlAdd,$db_conn)){
                $show = 'Les donn&eacute;es ont &eacute;t&eacute; enregistr&eacute;es';    
            }
            
            if($go == 'table'){
                $pid = $_GET['pid'];
                include('add_table.php');
            }
            
            if($go == 'img'){
                $pid = $_GET['pid'];
                include('add_img.php');
            }
        break;
    
        case 'mod':
            $id = $_GET['id'];
            if($go == 'cats'){
                include('mod_cats.php');
            }
            if($go == 'prods'){
				$extra = '<script type="text/javascript" src="scriptsPlus.js"></script>';
                include('mod_prods.php');
            }
            if($go == 'icons'){
                $pid = $_GET['pid'];
                include('mod_icons.php');
            }
			if($go == 'section'){
                $id = $_GET['id'];
				$att = 0;
                include('mod_section.php');
            }
			
			if($go == 'sectionf'){
                $id = $_GET['id'];
				$att = 1;
                include('mod_section.php');
            }
			
        break;
    
        case 'del':
            $id = $_GET['id'];
            
            if($go == 'cats'){
                //para esta o products, tiene que confirmar, sin ejecutar consulta en la bd
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=catsConf&id='.$id.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }elseif($go == 'prods'){
                //para esta o products, tiene que confirmar, sin ejecutar consulta en la bd
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=prodsConf&id='.$id.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }elseif($go == 'table'){
                //para esta o products, tiene que confirmar, sin ejecutar consulta en la bd
				$pid = $_GET['pid'];
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=tableConf&id='.$id.'&pid='.$pid.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }elseif($go == 'img'){
				$pid = $_GET['pid'];
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=imgConf&id='.$id.'&pid='.$pid.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }elseif($go == 'chars'){
				$pid = $_GET['pid'];
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=charsConf&id='.$id.'&pid='.$pid.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }
			elseif($go == 'section'){
				$id = $_GET['id'];
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=sectConf&id='.$id.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }
			elseif($go == 'sectionf'){
				$id = $_GET['id'];
                $show = 'Vous etes sur? <a href="index.php?ref=del&go=sectfConf&id='.$id.'">Confirmer</a> <a href="index.php">Non! Retourner</a>';
            }
            else{            
                if($go == 'users'){
                    $sqlDel = "DELETE FROM users WHERE user_id=$id";
                }
                
                if($go == 'catsConf'){
                    $sqlDel = "DELETE FROM categories WHERE cat_id=$id";
                }
				
				if($go == 'sectConf'){
                    $sqlDel = "DELETE FROM site_sections WHERE section_id=$id";
                }
				
				if($go == 'sectfConf'){
                    $sqlDel = "DELETE FROM site_footers WHERE section_id=$id";
                }
                
                if($go == 'imgConf'){
					$pid = $_GET['pid'];
                    $sqlDelData = "DELETE FROM prods_imgs WHERE img_id=$id AND prod_id=$pid";
                    $queryDelData = @mysql_query($sqlDelData,$db_conn);
                    $sqlDel = "DELETE FROM images WHERE img_id=$id";
					$return = '<a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
                }
				
				if($go == 'charsConf'){
					$pid = $_GET['pid'];
                    $sqlDel = "DELETE FROM prods_chars WHERE char_id=$id AND prod_id=$pid";
					$return = '<a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
                }
                
                if($go == 'tableConf'){
					$pid = $_GET['pid'];
                    $sqlDelData = "DELETE FROM table_data WHERE table_id=$id";
                    $queryDelData = @mysql_query($sqlDelData,$db_conn);
                    $sqlDelProds = "DELETE FROM tables_prods WHERE table_id=$id AND prod_id=$pid";
                    $queryDelProds = @mysql_query($sqlDelProds,$db_conn);
                    $sqlDelStruct = "DELETE FROM table_structure WHERE table_id=$id";
                    $queryDelStruct = @mysql_query($sqlDelStruct,$db_conn);
                    $sqlDel = "DELETE FROM tables_price WHERE table_id=$id";
					$return = '<a href="index.php?ref=viewProd&id='.$pid.'">Retourner au produit</a>';
                }
                
                if($go == 'prodsConf'){
                    $sqlDelIcons = "DELETE FROM icons_prods WHERE prod_id=$id";
                    $queryDelIcons = @mysql_query($sqlDelIcons,$db_conn);
                    $sqlDelImgs = "DELETE FROM imgs_prods WHERE prod_id=$id";
                    $queryDelImgs = @mysql_query($sqlDelImgs,$db_conn);    
                    $sqlDelChars = "DELETE FROM prods_chars WHERE prod_id=$id";
                    $queryDelChars = @mysql_query($sqlDelChars,$db_conn);
                    $sqlDelTables = "DELETE FROM tables_prods WHERE prod_id=$id";
                    $queryDelTables = @mysql_query($sqlDelTables,$db_conn);
                    $sqlDel = "DELETE FROM products WHERE prod_id=$id";  
                }
                
                if($queryDel = @mysql_query($sqlDel,$db_conn)){
                    $show = 'Les donn&eacute;es ont &eacute;t&eacute; effac&eacute;es';    
                }
            }

        break;
    
        case 'viewProd':
            $id = $_GET['id'];
            include('view_prod.php');
        break;
    
        case 'viewTab':
            $id = $_GET['id'];
            include('view_tab.php');
        break;
		
		 case 'viewTabF':
            $id = $_GET['id'];
			$att = 1;
            include('view_tab.php');
        break;
    }
}


switch($go){
    case 'login':
        $selected = 'Connexion';
        $show = '<form name="login" action="index.php?ref=verifyLogin" method="post">
        Nom d\'utilisateur:<br /><input name="username" type="text" /><br />
        Mot de passe:<br /><input name="password" type="password" /><br />
        <input type="submit" name="submit" value="Verifier" />
        </form>';       
    break;

    case 'main':
        $selected = 'Accueil';
        $show = '<ul id="mainOpts" class="opciones">
        <li><a class="mainOpts" href="index.php?go=prods">Produits</a></li>';
        if($_SESSION['user_id']==1){
            $show .= '<li><a class="mainOpts" href="index.php?go=users">Utilisateurs</a></li>';
        }
        $show .= '</ul>';
    break;

    case 'prods':
            //si llego una accion, ejecuta y vuelve a la pagina anterior
            $selected = 'Produits';
            if(strlen($ref)==0 || !isset($ref)){
                include('products.php');
            }
    break;

    /*
    case 'prov':
        //verifica que no haya llegado ningun otro ref y muestra el inicio de proveedores.
        //si llego una accion, ejecuta y vuelve a la pagina anterior
        $selected = 'Fournisseurs';
        if(strlen($ref)==0 || !isset($ref)){
            include('providers.php');
        }
    break;
    */
    
    case 'users':
        if($_SESSION['user_id']==1){
            $selected = 'Utilisateurs';
            if(strlen($ref)==0 || !isset($ref)){
                include('users.php');  
            }
        }
    break;
    
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Prontolux || ADMIN</title>
        <link rel="stylesheet" href="../styles.css" type="text/css">
        <script type="text/javascript" src="scripts.js"></script>
        <?php echo $extra; ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                    <a id="logo" href="index.php"><img class="logo" src="images/logo.jpg" /><br />
                    <span style="color:red; font-weight:bold; font-size:16px;">ADMIN</span></a>
                    <?php if($ref!='viewProd'){
					?>
                    <ul id="menu">
                            <li><a href="index.php?go=prods">Produits</a></li>
                            <?php
                            	$sqlSections = "SELECT * FROM site_sections WHERE is_shown=1 ORDER BY section_order";
                                if($querySections = @mysql_query($sqlSections, $db_conn)){
                                    while($resSections = mysql_fetch_array($querySections)){
                                        echo '<li><a href="index.php?ref=viewTab&id='.$resSections['section_id'].'">'.$resSections['section_name'].'</a></li>';
                                    }
                                }
                                ?>
                             <li><a class="addLink" href="index.php?ref=add&go=section">Ajouter section</a></li>
                    </ul>
                    <?php
                    }else{
							?>
                            
							<a href="#" onClick="window.print()" style="float:right; margin-right:35px; margin-top:50px;"><img width="35" src="admin/images/imprimante.jpg" /><br /></a>
                            
						<?php
						} ?>
                    <?php
                    if(isset($_SESSION['user_id'])){
                        echo '<span class="logout">Connect&eacute; comme <b>'.$_SESSION['name'].'</b> (<a href="index.php?ref=logOut">D&eacute;connexion</a>)</span>';
                    }
                    ?>
            </div>	
            <div id="principal">
                <div id="cookieTrail"></div><br />
                    <? echo $show; ?>
            </div> 
            <div id="footer">
                                   <ul id="footLinks">
                    <?php
                            $sqlSectionsF = "SELECT section_id, section_name, section_file FROM site_footers WHERE is_shown=1 ORDER BY section_order";
                            if($querySectionsF = @mysql_query($sqlSectionsF, $db_conn)){
                                    while($resSectionsF = mysql_fetch_array($querySectionsF)){
                                       			echo '<li><a href="index.php?ref=viewTabF&id='.$resSectionsF['section_id'].'">'.$resSectionsF['section_name'].'</a></li>';
                                        }
                                    }
                             ?>
                             
                              <li><a class="addLink" href="index.php?ref=add&go=sectionf">Ajouter section</a></li>
                    </ul>

            </div>
	</div>
        
    </body>
    
</html>