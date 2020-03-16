<?php
// Exception générale pour la couche métier
class LogicError extends Exception {
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}