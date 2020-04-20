<?php
require 'logic_LogicError.php';
require 'logic_ActivityState.php';

/**
 * Classe permetant de stocker une activité.
 */
class Activity{
    /**
     * @var int ID de l'activité.
     * Unique.
     */
    private $ID;
    /**
     * @var ActivityState Etat stocké en francais dans la DB.
     */
    private $state;
    /**
     * @var string Résumé de l'activité.
     */
    private $summary;
    /**
     * @var string Date de début de l'activité.
     */
    private $start;
    /**
     * @var string Date de fin de l'activité.
     */
    private $end;
    /**
     * @var int Durée estimé de la tache.
     */
    private $duration;
    /**
     * @var string Nom du type de l'activité.
     */
    private $Name;
    /**
     * @var int Numéro de la catégorie de l'activité.
     */
    private $Kind;
    /**
     * @var string Détails de l'activité.
     */
    private $Details;


    /**
     * Activity constructor.
     *
     *
     * @param int $aID              ID de l'activité.
     * @param string $aName         Nom de la catégorie de l'activité.
     * @param string $aSummary      Résumé de l'activité. Equivaut aussi au nom de cette dernière.
     * @param ActivityState $aState Etat de l'activité.
     */
    public function __construct(int $aID, string $aName, string $aSummary, $aState){
        $this->setID($aID);
        $this->setName($aName);
        $this->setSummary($aSummary);
        $this->setState($aState);
    }


    // ASSESSEURS DES ATTRIBUTS DE LA CLASS
    /**
     * Assesseur de la variable ID.
     *
     *
     * @return int ID de l'activité.
     */
    public function getID(){
        return $this->ID;
    }

    /**
     * Assesseur de la variable state.
     *
     *
     * @return ActivityState Etat de l'activité.
     */
    public function getState(){
        return $this->state;
    }

    /**
     * Assesseur de la variable summary.
     *
     *
     * @return string Résumé de l'activité.
     */
    public function getSummary(){
        return $this->summary;
    }

    /**
     * Assesseur de la variable start.
     *
     *
     * @return string Date de début de l'activité.
     */
    public function getStart(){
        return $this->start;
    }

    /**
     * Assesseur de la variable end.
     *
     *
     * @return string Date de fin de l'activité.
     */
    public function getEnd(){
        return $this->end;
    }

    /**
     * Assesseur de la variable duration.
     *
     *
     * @return int Durée estimée de l'activité.
     */
    public function getDuration(){
        return $this->duration;
    }

    /**
     * Assesseur de la variable name.
     *
     *
     * @return string Nom de la catégorie de l'activité.
     */
    public function getName(){
        return $this->Name;
    }

    /**
     * Assesseur de la variable Kind.
     *
     *
     * @return int ID de la catégorie de l'activité.
     */
    public function getKind(){
        return $this->Kind;
    }

    /**
     * Assesseur de la variable Details.
     *
     *
     * @return string Détails de l'activité.
     */
    public function getDetails(){
        return $this->Details;
    }


    // MUTATTEURS DES ATTRIBUTS DE LA CLASS
    /**
     * Mutateur de la variable ID.
     *
     *
     * @param int $aID ID de l'activité
     */
    private function setID(int $aID){
        $this->ID = $aID;
    }

    /**
     * Mutateur de la variable state.
     *
     *
     * @param ActivityState $aState Etat de l'activité
     */
    private function setState($aState){
        if(in_array($aState, [ActivityState::CANCELED, ActivityState::FINISHED, ActivityState::ONGOING])){
            $this->state = $aState;
        }
        else {
            $this->state = ActivityState::PLANNED;
        }
    }

    /**
     * Mutateur de la variable summary.
     *
     *
     * @param string $aSummary Résumé de l'activité
     */
    public function setSummary(string $aSummary){
        if($aSummary != '') {
            $this->summary = $aSummary;
        }
    }

    /**
     * Mutateur de la variable start.
     *
     *
     * @param string $aStart Date de début de l'activité
     */
    public function setStart($aStart){
        if($aStart == null) {
            $this->start = '';
        } elseif($this->getEnd() == ''){
            $this->start = $aStart;
        } elseif (($aStart->diff($this->getEnd())->invert) == 0){
            $this->start = $aStart;
        }
    }

    /**
     * Mutateur de la variable end.
     *
     *
     * @param string $aEnd Date de fin de l'activité
     */
    public function setEnd($aEnd){
        if($aEnd == null) {
            $this->end = '';
        } elseif($this->getStart() == ''){
            $this->end = $aEnd;
        } elseif (($aEnd->diff($this->getStart())->invert) == 1 OR $aEnd == $this->getStart()){
            $this->end = $aEnd;
        }
    }

    /**
     * Mutateur de la variable duration.
     *
     *
     * @param int $aDuration Durée prévue de l'activité
     */
    public function setDuration(int $aDuration){
        $this->duration = $aDuration;
    }

    /**
     * Mutateur de la variable Name.
     *
     *
     * @param string $aName Nom de la catégorie de l'activité
     */
    private function setName(string $aName){
        $this->Name = $aName;
    }

    /**
     * Mutateur de la variable Kind.
     *
     *
     * @param int $aKind ID de la catégorie de l'activité
     */
    public function setKind(int $aKind){
        $this->Kind = $aKind;
    }

    /**
     * Mutateur de la variable Details.
     *
     *
     * @param string $aDetails Détails de l'activité
     */
    public function setDetails(string $aDetails){
        $this->Details = $aDetails;
    }


    // METHODES DE LA CLASS
    public function StartActivity(){

    }

    public function Finish(){

    }

    public function Cancel(){

    }

    public function UnCancel(){

    }
}