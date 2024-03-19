<?php
const APP_URL = "http://localhost/app/prontolux/";

//connect to DB:
include(APP_URL.'admin/db_conn.php');





//connect to DB:
$ref = $_GET['ref'];
$go = $_GET['go'];




//connect CSS and JS files:
//$extra = '';
if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE')) != false){
    $IEjs = '<script type="text/javascript" src="scriptsPubIE.js"></script>';
    $IEst = '<link rel="stylesheet" href="stylesIE.css" type="text/css">';
}
else{
    $IEjs = '<script type="text/javascript" src="scriptsPub.js"></script>';
    $IEst = '<link rel="stylesheet" href="styles.css" type="text/css">';
}

if(strlen($ref)==0 && strlen($go)==0){
    $go = 'main';
}


//CONNECT TOP MENU (pub_view_prod.php):
//si viene un ref o un go, ver cada caso
switch($ref){
    case 'viewProd':
        $id = $_GET['id'];
        $startup_img = $_GET['img'];
        include('pub_view_prod.php');
        break;

    case 'sections':
        $section_id = $go;
        $startup_img = $_GET['img'];
        $sqlSections = "SELECT * FROM site_sections WHERE is_shown=1 AND section_id=$section_id";
        if($querySections = @mysql_query($sqlSections, $db_conn)){
            while($resSections = mysql_fetch_array($querySections)){
                $show = '<img src="admin/images/home/head/'.$startup_img.'_head.jpg class="fontimg" /><br />
                   		<p id="sectionP">'.$resSections['section_contents'].'</p><br /><br /><br />';
            }
        }
        break;

    //CONNECT FOOTER MENU:
    case 'sectionsf':
        $section_id = $go;
        $startup_img = $_GET['img'];
        $sqlSectionsF = "SELECT * FROM site_footers WHERE is_shown=1 AND section_id=$section_id";
        if($querySectionsF = @mysql_query($sqlSectionsF, $db_conn)){
            while($resSectionsF = mysql_fetch_array($querySectionsF)){
                $show = '<br />
                   		<p id="sectionP">'.$resSectionsF['section_contents'].'</p><br /><br /><br />';
            }
        }
        break;
}



switch($go){

    case 'main':
        $files_raw = scandir("admin/images/home/");
        foreach($files_raw as $file){
            $file = trim($file);
            if(substr($file, -4) == '.jpg'){
                $imgs[] = substr($file,0,strpos($file,"."));
            }
        }

        while(!array_key_exists($rand_img,$imgs)){
            $rand_img = rand(1,sizeof($imgs));
        }

        $startup_img = $imgs[$rand_img];
        $show = '<img src="admin/images/home/'.$startup_img.'.jpg" class="fontimg" />';
        break;

    case 'prods':
        $startup_img = $_GET['img'];
        if(strlen($ref)==0 || !isset($ref)){
            //$cookie = '<a href="index.php?go=prods">Produits</a> ';
            include('pub_products.php');
        }
        break;

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="fr" xml:lang="fr" xmlns="http://www.w3.org/1999/xhtml">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-type" content="text/html; charset=iso-8859-1" />

<script src="https://cdn.tailwindcss.com"></script>
<head>

    <title>Prontolux</title>
    <?php echo $IEst; ?>
    <script type="text/javascript" src="getElementsByClassName-1.0.1.js"></script>
    <?php echo $IEjs; ?>
</head>


<body>
<div id="container" class="">
    <div id="header" class="border-red-500 h-[700px] ">
        <?php if($ref!='viewProd'){
            ?>
            <a id="logo" href="index.php"><img class="logo w-[10%]" src="admin/images/logo.jpg" />la lumiere partout...</a>
            <div id="search"><form name="search" action="index.php?go=prods&act=search&img=<?php echo $startup_img; ?>" method="post"><input type="text" name="qry" /><input type="submit" value="Recherche" class="send"></form></div>
            <ul id="menu">
                <li><a <?php
                    if($go == 'prods'){
                        echo 'class="selected"';
                    }
                    ?> href="index.php?go=prods&img=<?php echo $startup_img; ?>">Produits</a></li>
                <?php
                $sqlSections = "SELECT section_id, section_name, section_file FROM site_sections WHERE is_shown=1 ORDER BY section_order";
                if($querySections = @mysql_query($sqlSections, $db_conn)){
                    while($resSections = mysql_fetch_array($querySections)){
                        if(strlen($resSections['section_file'])>0){
                            echo '<li><a href="http://'.$resSections['section_file'].'"';
                        }else{
                            echo '<li><a href="index.php?ref=sections&go='.$resSections['section_id'].'&img='.$startup_img.'"';

                            if($ref=='sections'){
                                if($resSections['section_id']==$section_id){
                                    echo 'class="selected"';
                                }
                            }
                        }
                        echo '>'.$resSections['section_name'].'</a></li>';
                    }
                }
                ?>
            </ul>
        <?php }else{
            ?>
            <img class="logo" src="admin/images/logo.jpg" style="width:180px;" />
            <a href="#" onClick="window.print()" style="float:right; margin-right:35px; margin-top:50px;"><img width="35" src="admin/images/imprimante.jpg" /><br /></a>

            <?php
        } ?>
    </div>
    <div id="principal">
        <div id="cookieTrail"><? echo $cookie; ?></div>
        <? echo $show; ?>
    </div>
    <div id="footer">
        <ul id="footLinks">
            <?php
            $sqlSectionsF = "SELECT section_id, section_name, section_file FROM site_footers WHERE is_shown=1 ORDER BY section_order";
            if($querySectionsF = @mysql_query($sqlSectionsF, $db_conn)){
                while($resSectionsF = mysql_fetch_array($querySectionsF)){
                    if(strlen($resSectionsF['section_file'])>0){
                        echo '<li><a href="http://'.$resSectionsF['section_file'].'"';
                    }else{
                        echo '<li><a href="index.php?ref=sectionsf&go='.$resSectionsF['section_id'].'&img='.$startup_img.'"';
                    }
                    echo '>'.$resSectionsF['section_name'].'</a></li>';
                }
            }
            ?>
        </ul>
    </div>
</div>

</body>

</html>