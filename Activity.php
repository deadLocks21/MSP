<?php
// Représente une activité
class Activity extends ActivityState {
    private $ID;
    private $state;
    private $summary;
    private $start;
    private $end;
    private $duration;
    private $Name;
    private $Kind;
    private $Details;



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

    private function setState(ActivityState $aState)
    {
        $this->state = $aState;
    }

    public function setSummary(string $aSummary)
    {
        if($aSummary != '') {
            $this->summary = $aSummary;
        }
    }

    public function setStart(DateTime $aStart)
    {
        $this->start = $aStart;
    }

    public function setEnd(DateTime $aEnd)
    {
        $this->end = $aEnd;
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
}
