<?php
require '/var/www/public/ihm/ToolsIHM.php';
require '/var/www/public/database/ActivityDAO.php';
require '/var/www/public/ihm/ActivitiesWindow.php';

$tIHM = new ToolsIHM();

$projID =  $tIHM->getIdProjSel();
$user = $tIHM->getUC();


if(isset($projID) AND $projID != 0 AND isset($user)){
    $proj = new Project($projID);

    $aDAO = new ActivityDAO();

    $activities = $aDAO->ReadActivities($proj, $user);

    new ActivitiesWindow($activities);
} else {
    header('Location: http://192.168.1.27/');
}