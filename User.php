<?php
class User{
    private $ID;
    private $Name;
    private $Login;
    private $PasswordHash;

    
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

    private function setName(int $aName){
        $this->Name = $aName;
    }

    private function setLogin(int $aLogin){
        $this->Login = $aLogin;
    }

    private function setPasswordHash(int $aPasswordHash){
        $this->PasswordHash = $aPasswordHash;
    }
}
