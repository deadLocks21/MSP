<?php
/**Classe permettant d'afficher les infos sur un rpofile et le modifier.*/
class ProfileWindow{
    public function __construct($user){
        echo $this->callPage($user);
    }

    private function callPage($u){

        return '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styles/light/styleProfileWindow.css" type="text/css"/>
		<title>Page de profil</title>
	</head>

<body>
	<div id="container">
		<form action="librairies/action_ProfileWindow.Update.php" method="POST">
			<h1>Profil</h1>
			<label><b>Prénom NOM</b></label>
			</br>
			<input readonly id="text" value="'.$u->getName().'">
			</br>
			<label><b>Nom d\'utilisateur</b></label>
			</br>
			<input readonly id="text" value="'.$u->getLogin().'">
			</br>
			<label><b>Mot de passe</b></label>
			<input type="password" id="text" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Doit contenir au moins un nombre et une majuscule et des minuscules, ainsi que 8 caractères minimum." placeholder="Saisir votre nouveau mot de passe" required>
			<input type="submit" id=\'submit\' value=\'Modifier\'>
			<input type="reset" id=\'submit\' value=\'Annuler\' onclick="document.location.href=\'https://'.$_SERVER['HTTP_HOST'].'\'">
		</form>	
	</div>
</body>	
</html>';
    }
}