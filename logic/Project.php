<?php
class Project{
    private $ID;
    private $Name;


    // Constructeur de la class Project
    public function __construct(int $aID){
        $this->setID($aID);
    }


    // Getter de la class Project
    public function getID(){
        return $this->ID;
    }

    public function getName(){
        return $this->Name;
    }


    // Setter de la class Project
    private function setID(int $aID){
        $this->ID = $aID;
    }

    public function setName(string $aName){
        $this->Name = $aName;
    }
}

header('Location: http://192.168.1.27');