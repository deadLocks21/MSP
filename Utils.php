<?php
// Contient divers utilitaires pour l'ensemble de la couche métier
class Utils{
     //Retourne un hachage de pass.
    public function HashPassword(string $pass){
        return string;
    }

    // Indique si le mot de passe respecte les consignes de sécurité.
    public function IsPasswordSafe(string $pass){
        return boolean;
    }

    // Indique le nombre de travail par jour pour une personne.
    public function GetWorkHoursByDay(){
        return int;
    }
}