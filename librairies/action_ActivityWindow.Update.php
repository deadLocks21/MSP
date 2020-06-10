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
        switch ($_POST['statut']){
            case ActivityState::PLANNED :
                $activity->UnCancel();
                break;
            case ActivityState::ONGOING :
                $activity->StartActivity();
                break;
            case ActivityState::FINISHED :
                $activity->Finish();
                break;
            case ActivityState::CANCELED :
                $activity->Cancel();
                break;
        }

        $aDAO->Update($activity);

        header('Location: https://'.$_SERVER['HTTP_HOST'].'/activities.php?name='.$_POST['pName']);
    } catch (BadActivityStateError $e) {
        header('Location: https://'.$_SERVER['HTTP_HOST'].'/activity.php?error=true&name='.$_POST['pName']);
    }
} else {
    header('Location: https://'.$_SERVER['HTTP_HOST'].'/');
}