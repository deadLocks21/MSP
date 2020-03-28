<?php
require 'ToolsIHM.php';

// Classe MainWindow
class MainWindow{
    private $tIHM;

    // Getter et Setter
    private function getTIHM() {
        return $this->tIHM;
    }

    private function setTIHM() {
        $this->tIHM = new ToolsIHM();
    }



    // Constructeur
    public function __construct(){
        $this->setTIHM();

        echo $this->callPage();
    }



    // Méthodes
    private function callPage(){
        $tIHM = $this->getTIHM();
        $user = $tIHM->getUC();
        $co = isset($user);


        $button = $this->getButtons($co);
        $corps = $this->getCorps($co);
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

    private function getCorps(bool $u){
        if($u){
            $crp = '<ul>
            <li><a>Projet 01</a></li>
            <li><a>Projet 02</a></li>
        </ul>';
        } else {
            $crp = '';
        }

        return $crp;
    }

    private function getUN(bool $u, $user){
        if($u){
            $return = 'Bienvenu technicien ' . strtoupper($user->getName());
        } else {
            $return = '';
        }

        return $return;
    }
}