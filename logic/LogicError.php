<?php
// Exception générale pour la couche métier
class LogicError extends Exception {
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}

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

header('Location: http://192.168.1.27');