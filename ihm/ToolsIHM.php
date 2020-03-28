<?php
session_start();
require '/var/www/public/logic/User.php';

// Variable vaut null si aucun utilisateur est connecté.
if(!isset($_SESSION['UserConnected'])){
    $_SESSION['UserConnected'] = null;
}

/**Classe contenant des outils pour les différents classes de l'IHM.*/
class ToolsIHM{
    /**
     * Setter de la variable UserConnected de la SESSION.
     *
     *
     * @param User $user
     */
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

    /**
     * Getter de UserConnected de la SESSION
     *
     *
     * @return User|null Retourne null si la variable n'est pas setter.
     */
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


    /**
     * Setter de UserConnected de la SESSION
     *
     *
     * @return array
     */
    public function getUCArray(){
        return $_SESSION['UserConnected'];
    }

    /**
     * Getter de UserConnected de la SESSION
     *
     *
     * @param array $UC
     */
    public function setUCArray($UC){
        $_SESSION['UserConnected'] = $UC;
    }


    /**
     * Permet de setter une variable de SESSION
     *
     *
     * @param string $varName Nom de la variable à set.
     * @param mixed $varContent Contenu de la variable.
     */
    public function setSessionVar($varName, $varContent){
        $_SESSION[$varName] = $varContent;
    }

    /**
     * Permet de get une variable de session
     *
     *
     * @param string $varName Nom de la variable
     *
     * @return mixed|null Retourne null si la variable n'est pas set.
     */
    public function getSessionVar($varName){
        $return = null;

        if(isset($_SESSION[$varName])){
            $return = $_SESSION[$varName];
        }

        return $return;
    }


    /**
     * Permet de set la variable loginFail de SESSION
     *
     *
     * @param int $varContent Numéro correspondant à la réussite ou non du log.
     * - 0 : Réussis
     * - 1 : Erreur de MDP
     * - 2 : Erreur de login
     */
    public function setLoginFail($varContent){
        $_SESSION['loginFail'] = $varContent;
    }

    /**
     * Permet de récupérer la valeur de loginFail de SESSION.
     *
     *
     * @return int|null Vaut null si la variable n'est pas set.
     */
    public function getLoginFail(){
        $return = null;

        if(isset($_SESSION['loginFail'])){
            $return = $_SESSION['loginFail'];
        }

        return $return;
    }


}