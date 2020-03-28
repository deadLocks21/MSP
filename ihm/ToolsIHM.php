<?php
session_start();
require '/var/www/public/logic/User.php';

// Variable vaut null si aucun utilisateur est connecté.
if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}



class ToolsIHM{
    public function __construct(){
        $this->setUCArray($_SESSION['UserConnected']);
    }



    // Getter et Setter
    public function setUC($user) {
        if ($user != null){
            $return = array(
                "ID" => $user->getID(),
                "Name" => $user->getName(),
                "Login" => $user->getLogin(),
                "PasswordHash" => $user->getPasswordHash()
            );
        } else {
            $return = null;
        }


        $this->setUCArray($return);
    }

    public function getUC(){
        $myU = $this->getUCArray();
        $u = null;

        if(isset($myU)){
            $u = new User($myU['ID']);
            $u->setName($myU['Name']);
            $u->setLogin($myU['Login']);
            $u->setPasswordHash($myU['PasswordHash']);
        }

        return $u;
    }




    // Getter et Setter en User
    public function getUCArray(){
        return $_SESSION['UserConnected'];
    }

    public function setUCArray($UC){
        $_SESSION['UserConnected'] = $UC;
    }



    // Méthodes
    public function setSessionVar($varName, $varContent){
        $_SESSION[$varName] = $varContent;
    }

    public function getSessionVar($varName){
        $return = null;

        if(isset($_SESSION[$varName])){
            $return = $_SESSION[$varName];
        }

        return $return;
    }


    public function setLoginFail($varContent){
        $_SESSION['loginFail'] = $varContent;
    }

    public function getLoginFail(){
        $return = null;

        if(isset($_SESSION['loginFail'])){
            $return = $_SESSION['loginFail'];
        }

        return $return;
    }


}