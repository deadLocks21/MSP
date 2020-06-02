<?php
require 'ihm_ToolsIHM.php';
require 'database_ProjectDAO.php';

/**Classe permettant d'afficher la page de récap des projets ou rien en fonction de si un user est connected..*/
class MainWindow{
    public function __construct(){
        echo str_replace("\xE9", "é", $this->callPage());
    }



    private function callPage(){
        $tIHM = new ToolsIHM();
        $user = $tIHM->getUC();
        $co = isset($user);
        $theme = ToolsIHM::getLightTheme() ? "light" : "dark";
        $themeFr = ToolsIHM::getLightTheme() ? "sombre" : "clair";

        if($co){
            $corps = $this->getCorps($user);


            return '<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Page principale</title>
		<link rel="stylesheet" href="styles/'.$theme.'/styleMainWindow.css" type="text/css"/>
	</head>

<body>
	<div id=marge></div>
	<span id =tech>TECHINICIEN CONNECTÉ : '.$user->getName().'</span>
	<input type="submit" id=\'profil\' value=\'Profil\' onclick="document.location.href=\'https://'.$_SERVER['HTTP_HOST'].'/profile.php\'">
	<input type="submit" id=\'déconnexion\' value=\'Déconnexion\' onclick="document.location.href=\'librairies/action_LoginWindow.Disconnect.php\'">
	<div id=marge></div>
	<div id=projetCadre>
		<div id=titre>Projets attribués</div>
'.$corps.'
		<div id=projet><br></div>
	</div>
	
	<footer>
        <a id="changeColor" href="librairies/action_changeTheme.php">Passer en mode '.$themeFr.'</a>
    </footer>
</body>	
</html>';
        } else {
            header('Location: https://'.$_SERVER['HTTP_HOST'].'/login.php');
        }



    }


    /**
     * Permet de récupérer le corps de page à afficher.
     *
     *
     * @param bool $u TRUE si un user est connecté, FALSE sinon
     * @param User $user Variable contenant l'utilisateur connnecté (ou non).
     *
     * @return string Choissis ce qui doit etre affiché en fonction de $u
     */
    private function getCorps($user){
        $pDAO = new ProjectDAO();
        $crp = '';

        $projects = $pDAO->ReadProjects($user);

        foreach ($projects as $p) {
            $id = $p->getID();
            $name = $p->getName();

            $crp .= "            <div id=projet>Projet $name<input type='button' id='info' value='+' onclick=\"document.location.href='librairies/action_MainWindow.ChooseProject.php?pID=$id&name=$name'\"></div>\n";;
        }

        return $crp;
    }
}