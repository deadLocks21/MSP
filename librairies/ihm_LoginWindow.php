<?php
require 'ihm_ToolsIHM.php';


/**Classe permettant d'afficher la page pour se logguer.*/
class LoginWindow{
    public function __construct(){
        $tIHM = new ToolsIHM();

        $this->callPage($tIHM->getLoginFail());
    }

    private function callPage($etatLogin){
        echo '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="styles/light/styleLoginWindow.css" type="text/css"/>
		<title>Page de connexion</title>
	</head>

<body>
	<div id="container">
		<form action="librairies/action_LoginWindow.Connect.php" method="POST"\>
			<h1>Connexion</h1>
			<label><b>Nom d\'utilisateur</b></label>
			</br>
			<input type="text" ';

        echo $etatLogin == 2 ? 'value = "'.$_GET['login'].'"' : '';

        echo 'placeholder="Entrer le nom d\'utilisateur" name="login" required>';

        echo $etatLogin == 1 ? "<p class='error'>Cette utilisateur n'existe pas !!</p>" : '';

        echo '            </br>
			<label><b>Mot de passe</b></label>
			</br>
			<input type="password" placeholder="Entrer le mot de passe" name="password" required>';

        echo $etatLogin == 2 ? "<p class='error'>Mot de passe incorect ...</p>" : '';

        echo '            </br>
			<input type="submit" id="submit" value="LOGIN">
		</form>	
	</div>
</body>	
</html>';
    }
}