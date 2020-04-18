<?php
require './ihm/ToolsIHM.php';
require './logic/Activity.php';
require './database/ActivityDAO.php';
require './ihm/ActivityWindow.php';

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
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}