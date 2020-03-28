<?php
require 'ToolsIHM.php';
require '/var/www/public/database/ProjectDAO.php';

/**Classe permettant d'afficher la page de récap des projets ou rien en fonction de si un user est connected..*/
class MainWindow{
    public function __construct(){
        echo $this->callPage();
    }



    private function callPage(){
        $tIHM = new ToolsIHM();
        $user = $tIHM->getUC();
        $co = isset($user);


        $button = $this->getButtons($co);
        $corps = $this->getCorps($co, $user);
        $userName = $this->getUN($co, $user);


        return "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Main</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        $button
        
        <br />

        <p>$userName</p>

        $corps
        
    </body>
</html>";
    }


    /**
     * Permet de récupérer les boutons à afficher.
     *
     *
     * @param bool $u TRUE si un user est connécté, FALSE sinon
     *
     * @return string Choissis ce qui doit etre affiché en fonction de $u
     */
    private function getButtons(bool $u){
        if($u){
            $button = '<p><a href="/action/LoginWindow.Disconnect.php">Déconnexion</a></p>
        <p><a>Profil</a></p>';
        } else {
            $button = '<p><a href="login.php">Connexion</a></p>
        <p><a>Profil</a></p>';
        }

        return $button;
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
    private function getCorps(bool $u, $user){
        if($u){
            $pDAO = new ProjectDAO();
            $crp = "<ul>\n";

            $projects = $pDAO->ReadProjects($user);


            foreach ($projects as $p){
                $id = $p->getID();
                $name = $p->getName();

                $crp .= "            <li><a href=\"action/MainWindow.ChooseProject.php?pN=$id\">Projet $name</a</li>\n";
            }

            $crp .= '        </ul>';
        } else {
            $crp = '';
        }

        return $crp;
    }

    /**
     * Permet de récupérer le nom du technicien et un message de bienvenue à afficher.
     *
     *
     * @param bool $u TRUE si un user est connecté, FALSE sinon
     *
     * @return string Choissis ce qui doit etre affiché en fonction de $u
     */
    private function getUN(bool $u, $user){
        if($u){
            $return = 'Bienvenu technicien ' . strtoupper($user->getName());
        } else {
            $return = '';
        }

        return $return;
    }
}