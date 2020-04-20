<?php
/**
 *Ancêtre générale des exceptions de la base de données.
 */
class DaoError extends Exception {
    public function __construct($msg, $code = 0)
    {
        parent::__construct($msg, $code);
    }
}

/**Erreur dans la base de données*/
class DataBaseError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('Erreur lors de la connexion à la DB', 0);
    }
}

/**Exception indiquant une erreur de mot de passe. */
class BadPasswordError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('Erreur lors de la saisie du mot de passe.', 0);
    }
}

/**Erreur indiquant qu'un login n'est pas bon.*/
class BadUserError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('L\'utilisateur demandé n\'existe pas.', 0);
    }
}