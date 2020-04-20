<?php
require 'librairies/ihm_ToolsIHM.php';
require 'librairies/database_ActivityDAO.php';
require 'librairies/logic_Activity.php';
require 'librairies/ihm_ActivitiesWindow.php';

$tIHM = new ToolsIHM();

$projID = $tIHM->getIdProjSel();
$user = $tIHM->getUC();


if (isset($projID) AND $projID != 0 AND isset($user)) {
    $proj = new Project($projID);

    $aDAO = new ActivityDAO();

    $activities = $aDAO->ReadActivities($proj, $user);

    new ActivitiesWindow($activities);
} else {
    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
}