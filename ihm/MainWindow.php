<?php
// Classe MainWindow
class MainWindow{
    public function __construct(){
        echo "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Main</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        <p><a>Connexion</a></p>
        <p><a>Déconnexion</a></p>
        <p><a>Profil</a></p>

        <p>Technicien connecté : </p>

        <ul>
            <li><a>Projet 01</a></li>
            <li><a>Projet 02</a></li>
        </ul>
    </body>
</html>";
    }
}
