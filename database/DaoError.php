<?php
// Ancêtre général des exceptions (erreurs) possibles.
class DaoError extends Exception {
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}

// Erreur dans la connexion avec la base de données
class DataBaseError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('Erreur lors de la connexion à la DB', 0);
    }
}

// Type d'exception indiquant que le mot de passe n'est pas correct
class BadPasswordError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('Erreur lors de la saisie du mot de passe.', 0);
    }
}

// Type d'exception indiquant qu'un utilisateur n'existe pas
class BadUserError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('L\'utilisateur demandé n\'existe pas.', 0);
    }
}