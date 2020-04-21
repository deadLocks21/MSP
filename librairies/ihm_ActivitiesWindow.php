<?php
header('Content-type: text/html; charset=UTF-8');
/**Classe permettant d'afficher la page avec les différents activités d'un projet de UserConnected.*/
class ActivitiesWindow {
    public function __construct($acts){
        echo str_replace("\xE9", "é", $this->callPage($acts));
    }

    private function callPage($acts){
        $codeActs = $this->setActs($acts);


        return "<!DOCTYPE html>
<html>
	<head>
		<meta charset='UTF-8' />
		<title>Détail projet</title>
		<link rel=\"stylesheet\" href=\"styles/light/styleActivitiesWindow.css\" type=\"text/css\"/>
	</head>

<body>
	<div id=marge></div>
	<div id=projetCadre>
		<div id=titre>Liste des activités du projet</div>
		<br />
$codeActs
		<div id=projet><br></div>
	</div>
</body>	
</html>";
    }

    private function setActs($acts){
        $lis = "";

        foreach ($acts as $a){
            $actID = $a->getID();
            $actName = $a->getSummary();
            $actState = $a->getState();

            $lis .= "        <div id=projet><a>$actName ($actState)</a><input type='button' id='info' value='+' onclick=\"document . location . href = 'librairies/action_ActivitiesWindow.ChooseActivity.php?id=$actID'\"></div>\n";
        }

        return $lis;
    }

    private function  normaliseText($str){
        error_log($str);
        $unwanted_array = array(    'Š'=>'S', 'š'=>'s', 'Ž'=>'Z', 'ž'=>'z', 'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U',
                            'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss', 'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c',
                            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o',
                            'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b', 'ÿ'=>'y' );
        $str = strtr( $str, $unwanted_array );

        error_log($str);

        return $str;
}
}