<?php
session_start();
require '/var/www/public/logic/User.php';

if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}

// Classe MainWindow
class MainWindow{
    public function __construct(){
        $button = "";
        $corps = "";
        $userName = "";

        if($_SESSION['UserConnected'] == null){
            $button = '<p><a href=\'login.php\'>Connexion</a></p>
        <p><a>Profil</a></p>';
        } else {
            $button = '<p><a>Déconnexion</a></p>
        <p><a>Profil</a></p>';

            $corps = '<ul>
            <li><a>Projet 01</a></li>
            <li><a>Projet 02</a></li>
        </ul>';

           // $userName = $_SESSION['UserConnected']->getUser();
        }


        if(!isset($_SESSION['UserConnected'])){
            echo 'Null ...';
        } else {
            echo 'OK';
            echo print_r($_SESSION['UserConnected']);
        }


        echo "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Main</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        $button
        
        <br />

        <p>Technicien connecté : $userName</p>

        $corps
        
    </body>
</html>";
    }
}