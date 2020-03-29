<?php
/**Classe permettant d'afficher la page avec les différents activités d'un projet de UserConnected.*/
class ActivitiesWindow{
    public function __construct($acts){
        echo $this->callPage($acts);
    }

    private function callPage($acts){
        $codeActs = $this->setActs($acts);


        return "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Activities</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        <ul>
            $codeActs
        </ul>
    </body>
</html>";
    }

    private function setActs($acts){
        $lis = "";

        foreach ($acts as $a){
            $actID = $a->getID();
            $actName = $a->getSummary();
            $actState = $a->getState();

            $lis .= "        <li><a href=\"action/ActivitiesWindow.ChoseActivity.php?id=$actID\">$actName ($actState)</a></li>\n";
        }

        return $lis;
    }
}