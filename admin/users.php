<?php
session_start();
$sqlUsers = "SELECT * FROM users WHERE user_id NOT LIKE 1";
if($queryUsers = @mysql_query($sqlUsers, $db_conn)){
    while($resUsers = mysql_fetch_array($queryUsers)){
        $users[$resUsers['user_id']] = $resUsers['name'];
    }
}
$show = 'Options <br />
<ul id="mainOpts">
<li><a href="#addUser" class="mainOpts" onclick="showAddUser();">Cr&eacute;er nouveau administrateur</a>
<div id="addUser" style="display:none;"><br />
    <form name="addUserForm" action="index.php?ref=add&go=users" method="post">
    <h4>Informations pour se connecter</h4>
    Nom d\'utilisateur:<br /><input type="text" name="username" /><br />
    Mot de passe:<br /><input type="text" name="password" /><br />
    <br /><br />
    <h4>Informations de l\'utilisateur</h4>
    Nom:<br /><input type="text" name="name" /><br />
    E-mail:<br /><input type="text" name="email" /><br />
    <br />
    <input type="submit" value="Ajouter" name="submit" />
    </form>
<div>
</li>
<li><a href="#delUser" class="mainOpts" onclick="showDelUser();">Effacer utilisateur</a></li>
<div id="delUser" style="display:none;">';
foreach($users as $user_id=>$name){
$show .= '<a href="index.php?ref=del&go=users&id='.$user_id.'">'.$name.'</a><br />';
}
$show .= '</ul>';  

?>