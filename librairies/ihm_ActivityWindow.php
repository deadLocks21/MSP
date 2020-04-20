<?php
/**Classe permettant d'afficher une activité d'un projet de UserConnected.*/
class ActivityWindow{
    public function __construct($a){
        echo $this->callPage($a);
    }

    private function callPage($a){
        $kind = ucfirst($a->getName());
        $summary = ucfirst($a->getSummary());
        $details = ucfirst($a->getDetails());
        $debut = $this->getDebut($a->getStart());
        $fin = $this->getFin($a->getEnd());
        $statut = $this->getStatut($a->getState());


        return "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Activities</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        <p>Type d'activité : $kind</p>

        <p>Résumé : $summary</p>

        <p>Détails : $details</p>

        $debut

        $fin
        <br />

        <form action=\"librairies/action_ActivityWindow.Update.php\" method=\"POST\">
            <p>Statut :</p>
            $statut

            <br /><br />
            <p><input type=\"submit\" value=\"Fermer\"></p>
        </form>
    </body>
</html>";
    }

    private function getDebut($d){
        $return = "";

        if(isset($d)){
            $return = "        <p>Départ : $d</p>";
        }

        return $return;
    }

    private function getFin($d){
        $return = "";

        if(isset($d)){
            $return = "        <p>Fin prévue : $d</p>";
        }

        return $return;
    }

    private function getStatut($s){
        $return = "";

        if($s == ActivityState::ONGOING){
            $return .= '            <p><input type="radio" name="statut" value="ONGOING" checked>En cours</p>'."\n";
        } else {
            $return .= '            <p><input type="radio" name="statut" value="ONGOING">En cours</p>'."\n";
        }

        if($s == ActivityState::PLANNED){
            $return .= '            <p><input type="radio" name="statut" value="PLANNED" checked>Prévue</p>'."\n";
        } else {
            $return .= '            <p><input type="radio" name="statut" value="PLANNED">Prévue</p>'."\n";
        }

        if($s == ActivityState::FINISHED){
            $return .= '            <p><input type="radio" name="statut" value="FINISHED" checked>Terminée</p>'."\n";
        } else {
            $return .= '            <p><input type="radio" name="statut" value="FINISHED">Terminée</p>'."\n";
        }

        if($s == ActivityState::ONGOING){
            $return .= '            <p><input type="radio" name="statut" value="CANCELED" checked>Annulée</p>'."\n";
        } else {
            $return .= '            <p><input type="radio" name="statut" value="CANCELED">Annulée</p>'."\n";
        }


        return $return;
    }
}