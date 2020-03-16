<?php
// Ancêtre général des exceptions (erreurs) possibles.
class DaoError extends Exception {
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}