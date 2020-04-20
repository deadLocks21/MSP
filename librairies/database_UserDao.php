<?php
require 'database_DaoError.php';
require 'database_ToolsDAO.php';
//require '/var/www/public/logic/User.php';

/**
 * Permet de gérer un utilisateur contenu dans la DB.
 */
class UserDao {
    /**
     * Permet de récupérer les infos sur un utilisateur.
     *
     *
     * @param string $login Login fournit dans le formulaire de connexion.
     * @param string $password MDP fournit dans le formulaire.
     *
     * @return User|null Retourne un User si les infos sont bonnes ou null le cas échéant.
     *
     * @throws BadPasswordError Erreur retournée dans le cas ou le MDP rentré est faux.
     * @throws BadUserError Pareil mais pour le login
     */
    public function Read(string $login, string $password){
        $tDAO = new ToolsDAO();
        $user = null;

        $UaP = $tDAO->query("CALL UserAndPass(?, ?);", array($login, $password));

        $loginTrue = $UaP[0][0];
        $passTrue = $UaP[1][0];

        if($loginTrue == 1){
            if($passTrue == 1){
                $info = $tDAO->query("CALL GetUser(?, ?);", array($login, $password));
                $user = new User($info[0]['ID']);

                $user->setName($info[0]['nom']);
                $user->setLogin($login);
                $user->setPasswordHash($password);
            } else {
                throw new BadPasswordError();
            }
        } else {
            throw new BadUserError();
        }

        return $user;
    }

    /**
     * Permet de update les information d'un utilisateur.
     *
     *
     * @param User $user
     */
    public function Update(User $user){
        $tDAO = new ToolsDAO();

        $id = $user->getID();
        $name = $user->getName();
        $login = $user->getLogin();
        $password = $user->getPasswordHash();

        $tDAO->call("CALL AlterUser(?, ?, ?, ?);", array($id, $name, $login, $password));
    }
}
