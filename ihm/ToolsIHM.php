<?php
session_start();
require '/var/www/public/logic/User.php';

// Variable vaut null si aucun utilisateur est connecté.
if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}



class ToolsIHM{
    private $UC;

    public function __construct(){
        $this->setUC($_SESSION['UserConnected']);
    }



    // Getter et Setter du type User
    public function getUC(){
        return $this->UC;
    }

    public function setUC($UC){
        $this->UC = $UC;
        $this->saveUC();
    }



    // Getter et Setter en array
    public function getUCArray(){
        $return = null;
        $user = $this->getUC();

        if ($user != null){
            $return = array(
                "ID" => $user->getID(),
                "Name" => $user->getName(),
                "Login" => $user->getLogin(),
                "PasswordHash" => $user->getPasswordHash()
            );
        }


        return $return;
    }

    public function setUCArray(array $myU){
        $u = new User($myU['ID']);
        $u->setName($myU['Name']);
        $u->setLogin($myU['Login']);
        $u->setPasswordHash($myU['PasswordHash']);

        $this->setUC($u);
    }



    // Méthodes
    private function saveUC(){
        $_SESSION['UserConnected'] = $this->getUCArray();
    }
}