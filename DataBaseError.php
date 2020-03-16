<?php
require 'DaoError.php';

// Erreur dans la connexion avec la base de données
class DataBaseError extends DaoError {
    // Constructeur de la class
    public function __construct(){
        parent::__construct('Erreur lors de la connexion à la DB', 0);
    }
}
