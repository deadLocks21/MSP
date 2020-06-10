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
        $theme = ToolsIHM::getLightTheme() ? "light" : "dark";


        return "<!DOCTYPE html>
<html>
	<head>
		<meta charset=\"utf-8\" />
		<title>Page principale</title>
		<link rel=\"stylesheet\" href=\"styles/$theme/styleActivityWindow.css\" type=\"text/css\"/>
	</head>

<body>
    <div id=\"bandeau\">
		<a class=\"boutonpageprincipale\" href=\"index.php\">1.PAGE PRINCIPALE</a> 
		<a class=\"boutonactivités\" href=\"activities.php?name={$_GET["pName"]}\">2. {$_GET["pName"]}</a> 
		<a class=\"boutonactivity\" href=\"\">3. OPTIONS ACTIVITÉS</a> 
	</div>

	<div id=marge></div>
	<div id =id1>TYPE D'ACTIVITÉ : $kind</div>
	<div id=marge></div>
	<div id =id1>RESUMÉ : $summary</div>
	<div id=marge></div>		
	<span id=id2>$details</span>
	
	<form action=\"librairies/action_ActivityWindow.Update.php\" method=\"POST\">
        <span id=id3>
            
                $statut
                <input type='hidden' name='pName' value='{$_GET["pName"]}'>
                		
        </span>  			  			  			
	
        <span id=id4>
            $date
        </span>
	
	    <input type=\"submit\" id='modifier' value='Fermer'>
	</form>	
	<br />
</body>	
</html>";
    }

    private function getDebut($d){
        echo "getDebut $d";
        return $d != '' ? $d : null;
    }

    private function getFin($d){
        echo "getFin $d";
        return $d != '' ? $d : null;
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

        if($s == ActivityState::CANCELED){
            $return .= '            <p id="annulé"><input type="radio" name="statut" value="CANCELED" checked>Annulée</p>'."\n";
        } else {
            $return .= '            <p id="annulé"><input type="radio" name="statut" value="CANCELED">Annulée</p>'."\n";
        }

        if($_GET['error'] == 'true') $return .= "<p class='error'>Impossible d'accéder à cette état ...</p>";


        return $return;
    }

    private function getDate($d, $f){
        $ret = "";

        if(isset($d) || isset($f)){
            if(isset($d)){
                $ret .= "<p>DEBUT : $d</p>";
            }

            if(isset($d) && isset($f)){
               $ret .= "\n            <br />";
            }

            if(isset($f)){
                $ret .= "\n            <p>FIN : $f</p>";
            }
        }

        return $ret;
    }
}