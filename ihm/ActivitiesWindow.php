<?php

/**Classe permettant d'afficher la page avec les différents activités d'un projet de UserConnected.*/
class ActivitiesWindow{
    public function __construct(){
        echo $this->callPage();
    }

    private function callPage(){
        return "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Activities</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        <ul>
            <li><a>Activité 01</a></li>
            <li><a>Activité 02</a></li>
        </ul>
    </body>
</html>";
    }
}