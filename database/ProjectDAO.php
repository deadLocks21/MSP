<?php
require 'logic/User.php';
require 'logic/Project.php';
require 'ToolsDAO.php';

// Gère la base pour les objets Project
class ProjectDAO{
    public function ReadProjects(User $user){
        $tDAO = new ToolsDAO();

         $projects = $tDAO->query("CALL ReadProjects('".$user->getLogin()."');");

        $projDuU = array();
        foreach($projects as $proj){
            $p = new Project($proj['projetID']);
            $p->setName($proj['nom']);
            $projDuU[] = $p;
        }

        return $projDuU;
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
//echo print_r($p)."\n";

