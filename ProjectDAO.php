<?php
require 'User.php';
require 'Project.php';

// Gère la base pour les objets Project
class ProjectDAO{
    private function connection(){
        $conn = null;

        try {
            $conn = new PDO('mysql:host=localhost;dbname=dbMSP', 'DaoMSP', '!MdpDeMSP21.');
        } catch (PDOException $e) {
            throw new DataBaseError();
        }

        return $conn;
    }

    private function createProjects($numP){
        $conn = $this->connection();

        $res = array();
        foreach ($numP as $num){
            $req = $conn->query("SELECT nom FROM Projet WHERE ID=$num");
            $name = ($req->fetchAll())[0]['nom'];
            $req->closeCursor();

            $p = new Project($num);
            $p->setName($name);

            $res[] = $p;
        }

        return $res;
    }

    public function ReadProjects(User $user){
        $login = $user->getLogin();
        $requeteListProj = "SELECT projetID FROM Compose JOIN Projet ON projetID = Projet.ID JOIN Affecté ON Affecté.activitéID = Compose.activitéID JOIN Technicien ON Technicien.ID = technicienID JOIN Utilisateur ON Utilisateur.ID = Utilisateur_ID WHERE login='$login';";
        $conn = $this->connection();

        $req = $conn->query($requeteListProj);
        $listProj = ($req->fetchAll());
        $req->closeCursor();

        $numProjects = array();
        foreach ($listProj as $projet){
            if(!in_array($projet['projetID'], $numProjects)){
                $numProjects[] = $projet['projetID'];
            }
        }

        return $this->createProjects($numProjects);
    }
}

//$u = new User(1);
//$u->setName('Martin');
//$u->setLogin('ybenaissa');
//$u->setPasswordHash('746F746F');
//
//
//$pdao = new ProjectDAO();
//$p = $pdao->ReadProjects($u);
//echo print_r($p);
