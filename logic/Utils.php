<?php
// Contient divers utilitaires pour l'ensemble de la couche métier
class Utils{
     //Retourne un hachage de pass.
    public function HashPassword(string $pass){
        $hash = '';
        $lenPass = strlen($pass);

        for ($i=0; $i<$lenPass; $i++){
            $hash .= dechex(ord($pass[$i]));  // On récupère l'ord du caractère et on le converti en hexa.
        }

        return strtoupper($hash);
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