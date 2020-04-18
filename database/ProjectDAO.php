<?php
// require '/var/www/public/logic/User.php';
require './logic/Project.php';
require 'ToolsDAO.php';

/**Permet de gérer les projets présent dans la base de données.*/
class ProjectDAO{
    /**
     * Permet de récupérer les projets d'un utilisateur.
     *
     *
     * @param User $user Utilisateur dont on cherche les projets.
     *
     * @return array Array contenant les différents projets rattaché à un User.
     */
    public function ReadProjects(User $user){
        $tDAO = new ToolsDAO();

         $projects = $tDAO->query("CALL ReadProjects(?);", array($user->getLogin()));

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
//$u->setLogin('root');
//$u->setPasswordHash('746F746F');
//
//
//$pdao = new ProjectDAO();
//$p = $pdao->ReadProjects($u);
//echo print_r($p)."\n";