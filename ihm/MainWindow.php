<?php
session_start();

if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}

// Classe MainWindow
class MainWindow{
    public function __construct(){
        $button = "";

        if($_SESSION['UserConnected'] == null){
            $button = '<p><a href=\'login.php\'>Connexion</a></p>
        <p><a>Profil</a></p>';
        } else {
            $button = '<p><a>Déconnexion</a></p>
        <p><a>Profil</a></p>';
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

        <p>Technicien connecté : </p>

        <ul>
            <li><a>Projet 01</a></li>
            <li><a>Projet 02</a></li>
        </ul>
    </body>
</html>";
    }
}