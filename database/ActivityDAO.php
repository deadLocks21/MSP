<?php
require '/var/www/public/logic/Project.php';
require '/var/www/public/logic/Activity.php';
require '/var/www/public/logic/User.php';
require 'ToolsDAO.php';

/**Gère les Activité de la DB.*/
class ActivityDAO{
    /**
     * Permet de retourner le state avec la classe ActivityState
     *
     *
     * @param string $s Equivalent de l'ActivityState mais en francais. Il est stocké ainsi dans la DB.
     *
     * @return ActivityState|null Retourne null ou l'équivalent dans la classe ActivityState.
     */
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

    /**
     * Permet de lire les activités d'une personne sur un projet.
     *
     *
     * @param Project $p
     * @param User $u
     *
     * @return array Array conenant les différentes activités demandé.
     */
    public function ReadActivities(Project $p, User $u){
        $tDAO = new ToolsDAO();

        $activities = $tDAO->query("CALL ReadActivities(?, ?);", array($p->getID(), $u->getID()));

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

    /**
     * Permet de update une activité de la base de données.
     *
     *
     * @param Activity $a Activité modifié à changer dans la DB.
     */
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

        $tDAO->call("CALL AlterActivity(?, ?);", array($id, $statut));
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
//// $a->setState(ActivityState::FINISHED);
//
//$aDao->Update($a);
//
//echo print_r($aDao->ReadActivities($p, $u));
