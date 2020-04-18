<?php
require './ihm/ToolsIHM.php';
require './database/ActivityDAO.php';
require './logic/Activity.php';
require './ihm/ActivitiesWindow.php';

$tIHM = new ToolsIHM();

$projID =  $tIHM->getIdProjSel();
$user = $tIHM->getUC();


if(isset($projID) AND $projID != 0 AND isset($user)){
    $proj = new Project($projID);

    $aDAO = new ActivityDAO();

    $activities = $aDAO->ReadActivities($proj, $user);

    new ActivitiesWindow($activities);
} else {
    header('Location: http://'.$_SERVER['HTTP_HOST'].'/');
}