<?php
require 'LogicError.php';

// Exception indiquant que l'état de l'activité ne peut devenir celui indiqué
class BadActivityStateError extends LogicError{
    private $activity;
    private $desiredState;

    // Constructeur de la class
    public function __construct(Activity $a, $ds)
    {
        $msg = 'Une erreur à été levé par l\'activité '.$a->getName().' en assayant de passer son état à '.$ds.'.';
        parent::__construct($msg, 0);
    }
}
