<?php
/**Classe permettant d'afficher une activité d'un projet de UserConnected.*/
class ActivityWindow{
    public function __construct($a){
        echo str_replace("\xE9", "é", $this->callPage($a));
    }

    private function callPage($a){
        $kind = ucfirst($a->getName());
        $summary = ucfirst($a->getSummary());
        $details = ucfirst($a->getDetails());
        $debut = $this->getDebut($a->getStart());
        $fin = $this->getFin($a->getEnd());
        $statut = $this->getStatut($a->getState());
        $date = $this->getDate($debut, $fin);


        return "<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"utf-8\" />
		<title>Page principale</title>
		<link rel=\"stylesheet\" href=\"styles/light/styleActivityWindow.css\" type=\"text/css\"/>
	</head>

<body>
	<div id=marge></div>
	<div id =id1>TYPE D'ACTIVITÉ : $kind</div>
	<div id=marge></div>
	<div id =id1>RESUMÉ : $summary</div>
	<div id=marge></div>		
	<span id=id2>$details</span>
	<form id=id3 action=\"librairies/action_ActivityWindow.Update.php\" method=\"POST\">
	    $statut
    
	<span >
			
  	</span>  			  			  			
	
	$date
	<input type=\"submit\" id='modifier' value='Fermer'>
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
            $return .= '            <p id="encours"><input type="radio" name="statut" value="ONGOING" checked>En cours</p>'."\n";
        } else {
            $return .= '            <p id="encours"><input type="radio" name="statut" value="ONGOING">En cours</p>'."\n";
        }

        if($s == ActivityState::PLANNED){
            $return .= '            <p id="prévu"><input type="radio" name="statut" value="PLANNED" checked>Prévue</p>'."\n";
        } else {
            $return .= '            <p id="prévu"><input type="radio" name="statut" value="PLANNED">Prévue</p>'."\n";
        }

        if($s == ActivityState::FINISHED){
            $return .= '            <p id="terminé"><input type="radio" name="statut" value="FINISHED" checked>Terminée</p>'."\n";
        } else {
            $return .= '            <p id="terminé"><input type="radio" name="statut" value="FINISHED">Terminée</p>'."\n";
        }

        if($s == ActivityState::ONGOING){
            $return .= '            <p id="annulé"><input type="radio" name="statut" value="CANCELED" checked>Annulée</p>'."\n";
        } else {
            $return .= '            <p id="annulé"><input type="radio" name="statut" value="CANCELED">Annulée</p>'."\n";
        }


        return $return;
    }

    private function getDate($d, $f){
        $ret = "";

        if(isset($d) || isset($f)){
            $ret .= "<span id=id4>";

            if(isset($d)){
                $ret .= '			<label for=\"départ\">Début</label>
			<br>
  			'.$d.'
  			';
            }

            if(isset($d) && isset($f)){
               $ret .= '<br>
  			<br>
  			';
            }

            if(isset($f)){
                $ret .= '<label for="départ">Fin</label>
			<br>
  			'.$f;
            }

            $ret .= "</span>";
        }
    }
}