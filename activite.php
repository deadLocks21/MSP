<?php
require '/var/www/public/ihm/ToolsIHM.php';
require '/var/www/public/logic/Activity.php';
require '/var/www/public/database/ActivityDAO.php';
require '/var/www/public/ihm/ActivityWindow.php';

$tIHM = new ToolsIHM();

$projID =  $tIHM->getIdProjSel();
$user = $tIHM->getUC();
$actID =  $tIHM->getIdActSel();


if(isset($projID) AND $projID != 0 AND isset($user) AND isset($actID) AND $actID != 0){
    $proj = new Project($projID);
    $aDAO = new ActivityDAO();

    $activities = $aDAO->ReadActivities($proj, $user);

    $activity = array();
    foreach ($activities as $a) {
        $idActS = $a->getID();

        if ($idActS == $actID){
            $activity = $a;
        }
    }

    new ActivityWindow($activity);
} else {
    header('Location: http://192.168.1.27/');
}