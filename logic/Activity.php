<?php
require 'LogicError.php';
require 'ActivityState.php';

// Représente une activité
class Activity{
    private $ID;
    private $state;
    private $summary;
    private $start;
    private $end;
    private $duration;
    private $Name;
    private $Kind;
    private $Details;


    // Constructeur de la class
    public function __construct(int $aID, string $aName, string $aSummary,$aState){
        $this->setID($aID);
        $this->setName($aName);
        $this->setSummary($aSummary);
        $this->setState($aState);
    }


    // Getter de la class
    public function getID()
    {
        return $this->ID;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function getStart()
    {
        return $this->start;
    }

    public function getEnd()
    {
        return $this->end;
    }

    public function getDuration()
    {
        return $this->duration;
    }

    public function getProbaleEnd()
    {
        return $this->probaleEnd;
    }

    public function getName()
    {
        return $this->Name;
    }

    public function getKind()
    {
        return $this->Kind;
    }

    public function getDetails()
    {
        return $this->Details;
    }


    // Setter de la class
    private function setID(int $aID)
    {
        $this->ID = $aID;
    }

    private function setState($aState)
    {
        if(in_array($aState, [ActivityState::CANCELED, ActivityState::FINISHED, ActivityState::ONGOING])){
            $this->state = $aState;
        }
        else {
            $this->state = ActivityState::PLANNED;
        }
    }

    public function setSummary(string $aSummary)
    {
        if($aSummary != '') {
            $this->summary = $aSummary;
        }
    }

    public function setStart($aStart)
    {
        if($this->getEnd() == ''){
            $this->start = $aStart;
        }
        elseif (($aStart->diff($this->getEnd())->invert) == 0){
            $this->start = $aStart;
        }
    }

    public function setEnd($aEnd)
    {
        if($this->getStart() == ''){
            $this->end = $aEnd;
        }
        elseif (($aEnd->diff($this->getStart())->invert) == 1 OR $aEnd == $this->getStart()){
            $this->end = $aEnd;
        }
    }

    public function setDuration(int $aDuration)
    {
        $this->duration = $aDuration;
    }

    private function setName(string $aName)
    {
        $this->Name = $aName;
    }

    public function setKind(string $aKind)
    {
        $this->Kind = $aKind;
    }

    public function setDetails(string $aDetails)
    {
        $this->Details = $aDetails;
    }


    // Méthodes de la class
    public function StartActivity(){

    }

    public function Finish(){

    }

    public function Cancel(){

    }

    public function UnCancel(){

    }
}