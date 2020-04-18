<?php

/**
 * Classe contenant les exceptions générales pour la couche métier
 */
class LogicError extends Exception {
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}

/**
 * Exception indiquant que l'état de l'activité ne peut devenir celui indiqué
 */
class BadActivityStateError extends LogicError{
    /**
     * @var Activity Activité posant problème.
     */
    // private $activity;
    /**
     * @var ActivityState State que désire atteindre l'utilisateur.
     */
    // private $desiredState;

    /**
     * BadActivityStateError constructor.
     *
     *
     * @param Activity $a       Activité posant problème.
     * @param $ds ActivityState State que l'utilisateur cherche à atteindre.
     */
    public function __construct(Activity $a, $ds)
    {
        $msg = 'Une erreur à été levé par l\'activité '.$a->getName().' en assayant de passer son état à '.$ds.'.';
        parent::__construct($msg, 0);
    }
}