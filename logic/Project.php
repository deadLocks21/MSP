<?php
/**
 * Classe représentant un projet.
 */
class Project{
    /**
     * @var int ID du projet
     */
    private $ID;
    /**
     * @var string Nom du projet
     */
    private $Name;


    /**
     * Project constructor.
     *
     *
     * @param int $aID ID du projet.
     */
    public function __construct(int $aID){
        $this->setID($aID);
    }


    // ASSESSEURS DES ATTRIBUTS DE LA CLASS
    /**
     * Assesseur de l'attribut ID
     *
     *
     * @return int ID du projet
     */
    public function getID(){
        return $this->ID;
    }

    /**
     * Assesseur de l'attribut Name
     *
     *
     * @return string Nom du projet.
     */
    public function getName(){
        return $this->Name;
    }


    // MUTATEURS DES ATTRIBUTS DE LA CLASS
    /**
     * Mutateur de l'attribut ID.
     *
     *
     * @param int $aID ID du projet.
     */
    private function setID(int $aID){
        $this->ID = $aID;
    }

    /**
     * Mutateur de l'attribut Name.
     *
     *
     * @param string $aName Nom du projet.
     */
    public function setName(string $aName){
        $this->Name = $aName;
    }
}