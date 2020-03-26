<?php
//Représente un utilisateur du système.
class User{
    private $ID;
    private $Name;
    private $Login;
    private $PasswordHash;

    // Constructeur de la class User
    public function __construct(int $aID){
        $this->setID($aID);
    }



    // Save
    public function save(){
        $myUser = array(
            "ID" => $this->getID(),
            "Name" => $this->getName(),
            "Login" => $this->getLogin(),
            "PasswordHash" => $this->getPasswordHash()
        );

        return $myUser;
    }

    // Complete
    public function complete(array $myU){
        $this->setID($myU['ID']);
        $this->setName($myU['Name']);
        $this->setLogin($myU['Login']);
        $this->setPasswordHash($myU['PasswordHash']);
    }



    // Getter de la class User
    public function getID(){
        return $this->ID;
    }

    public function getName(){
        return $this->Name;
    }

    public function getLogin(){
        return $this->Login;
    }

    public function getPasswordHash(){
        return $this->PasswordHash;
    }


    // Setter de la class User
    private function setID(int $aID){
        $this->ID = $aID;
    }

    public function setName(string $aName){
        $this->Name = $aName;
    }

    public function setLogin(string $aLogin){
        $this->Login = $aLogin;
    }

    public function setPasswordHash(string $aPasswordHash){
        $this->PasswordHash = $aPasswordHash;
    }
}