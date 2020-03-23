<?php
require 'DaoError.php';
require 'User.php';
require 'ToolsDAO.php';

// Classe gérant le stockage dans le SGBD des objets User
class UserDao {
    public function Read(string $login, string $password){
        $tDAO = new ToolsDAO();
        $user = null;

        $UaP = $tDAO->query("CALL UserAndPass('$login', '$password');");

        $loginTrue = $UaP[0][0];
        $passTrue = $UaP[1][0];

        if($loginTrue == 1){
            if($passTrue == 1){
                $info = $tDAO->query("CALL GetUser('$login', '$password');");
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

    public function Update(User $user){

    }
}

//$u = new UserDao();
//$user = $u->Read('cmeunier','746F746F');
//
//echo 'id = '.$user->getID().'<br />';
//echo 'name = '.$user->getName().'<br />';
//echo 'login = '.$user->getLogin().'<br />';
//echo 'hash = '.$user->getPasswordHash().'<br />';