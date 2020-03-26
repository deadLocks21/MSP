<?php
require '/var/www/public/logic/Project.php';
require '/var/www/public/logic/Activity.php';
require '/var/www/public/logic/User.php';
require 'ToolsDAO.php';

// Classe gérant la persistance en BDD des activités
class ActivityDAO{
    private function getState($s){
        $res = null;

        if($s == "annulée"){
            $res = ActivityState::CANCELED;
        } elseif($s == "en cours"){
            $res = ActivityState::ONGOING;
        } elseif($s == "terminée"){
            $res = ActivityState::FINISHED;
        } elseif($s == "prévue") {
            $res = ActivityState::PLANNED;
        }

        return $res;
    }

    public function ReadActivities(Project $p, User $u){
        $tDAO = new ToolsDAO();

        $activities = $tDAO->query("CALL ReadActivities(".$p->getID().", ".$u->getID().");");

        $lesAct = array();
        foreach ($activities as $a){
            $act = new Activity($a['ActivitéID'], $a['nom'], $a['résumé'], $this->getState($a['statut']));
            $act->setStart($a['dateDébut']);
            $act->setEnd($a['dateFin']);
            $act->setDuration($a['duréePrévue']);
            $act->setKind($a['IDType']);
            $act->setDetails($a['détail']);

            $lesAct[] = $act;
        }

        return $lesAct;
    }

    public function Update(Activity $a){
        $tDAO = new ToolsDAO();
        $statut = "";

        $id = $a->getID();

        switch ($a->getState()) {
            case ActivityState::PLANNED:
                $statut = "prévue";
                break;
            case ActivityState::CANCELED:
                $statut = "annulée";
                break;
            case ActivityState::FINISHED:
                $statut = "terminée";
                break;
            case ActivityState::ONGOING:
                $statut = "en cours";
                break;
        }

        $tDAO->call("CALL AlterActivity($id, '$statut');");
    }
}

//$p = new Project(3);
//$u = new User(3);
//
//$aDao = new ActivityDAO();
//
//echo print_r($aDao->ReadActivities($p, $u));
//
//$a = ($aDao->ReadActivities($p, $u))[0];
//$a->setState(ActivityState::FINISHED);
//
//$aDao->Update($a);
//
//echo print_r($aDao->ReadActivities($p, $u));


header('Location: http://192.168.1.27');
