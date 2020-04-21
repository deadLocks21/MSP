<?php
require 'ihm_ToolsIHM.php';
require 'logic_Activity.php';
require 'database_ActivityDAO.php';

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

    try {
        if($_POST['statut'] == ActivityState::PLANNED) $activity->UnCancel();
        elseif($_POST['statut'] == ActivityState::ONGOING) $activity->StartActivity();
        elseif($_POST['statut'] == ActivityState::FINISHED) $activity->Finish();
        elseif($_POST['statut'] == ActivityState::CANCELED) $activity->Cancel();

        $aDAO->Update($activity);

        header('Location: https://'.$_SERVER['HTTP_HOST'].'/activities.php');
    } catch (BadActivityStateError $e) {
        header('Location: https://'.$_SERVER['HTTP_HOST'].'/activity.php?error=true');
    }
    echo print_r($activity);
    echo print_r($_POST);
} else {
    header('Location: https://'.$_SERVER['HTTP_HOST'].'/');
}