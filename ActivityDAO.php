<?php
require 'Project.php';
require 'Activity.php';
require 'User.php';

// Classe gérant la persistance en BDD des activités
class ActivityDAO{
    private function connection(){
        $conn = null;

        try {
            $conn = new PDO('mysql:host=localhost;dbname=dbMSP', 'DaoMSP', '!MdpDeMSP21.');
        } catch (PDOException $e) {
            throw new DataBaseError();
        }

        return $conn;
    }

    private function actsDuProj(Project $p){
        $c = $this->connection();
        $id = $p->getID();
        $demandeInfoAct = "SELECT * FROM Compose JOIN Activité ON activitéID = ID WHERE projetID = $id;";

        $resInfoActs = $c->query($demandeInfoAct);
        $infosActs = $resInfoActs->fetchAll();

        $resInfoActs->closeCursor();
        $c = null;

        return $infosActs;
    }

    private function devForAnAct($id){
        $c = $this->connection();
        $queryTech = "SELECT * FROM Affecté JOIN Technicien ON technicienID = Technicien.id WHERE activitéID = ".$id.";";

        $resTech = $c->query($queryTech);
        $tech = $resTech->fetchAll();

        $resTech->closeCursor();
        $c = null;

        return $tech;
    }

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

    private function getName($id){
        $c = $this->connection();

        $resNom = $c->query('SELECT * FROM Activité_type WHERE id='.$id.';');
        $res = ($resNom->fetchAll())[0][1];

        $resNom->closeCursor();
        $c = null;

        return $res;
    }

    private function createAct($a){
        $ID = $a['activitéID'];
        $state = $this->getState($a['statut']);
        $summary = $a['résumé'];
        $start = $a['dateDébut'];
        $end = $a['dateFin'];
        $duration = $a['duréePrévue'];
        $Kind = $a['IDType'];
        $Name = $this->getName($Kind);
        $Details = $a['détail'];

        $act = new Activity($ID, $Name, $summary, $state);
        $act->setStart($start);
        $act->setEnd($end);
        $act->setDuration($duration);
        $act->setKind($Kind);
        $act->setDetails($Details);

        return $act;
    }

    public function ReadActivities(Project $p, User $u){

        $activitys = $this->actsDuProj($p);
        $devID = $u->getID();


        $actsConcernees = array();
        foreach ($activitys as $act){
            $developpers = $this->devForAnAct($act['activitéID']);

            foreach ($developpers as $dev){
                if($dev['UTILISATEUR_ID'] == $devID){
                    $actsConcernees[] = $act;
                }
            }
        }

        $res = array();
        foreach ($actsConcernees as $actC){
            $res[] = $this->createAct($actC);
        }

        return $res;  // Array de Activity
    }

    public function Update(Activity $a){

    }
}

$p = new Project(3);
$u = new User(3);

$aDao = new ActivityDAO();
echo print_r($aDao->ReadActivities($p, $u));