<?php
/**
 * Outils pour l'ensemble de la couche métier.
 */
class Utils{
    /**
     * Hash la variable $pass et la retourne.
     *
     *
     * @param string $pass Mot de passe brut de l'utilisateur.
     *
     * @return string Hash du mot de passe.
     */
    public function HashPassword(string $pass){
        $hash = '';
        $lenPass = strlen($pass);

        for ($i=0; $i<$lenPass; $i++){
            $hash .= dechex(ord($pass[$i]));  // On récupère l'ord du caractère et on le converti en hexa.
        }

        return strtoupper($hash);
    }

    /**
     * Indique si le mot de passe respecte les consignes de sécurité.
     *
     *
     * @param string $pass Mot de passe brut de l'utilisateur.
     *
     * @return bool Retourne TRUE si il respecte les conditions.
     */
    public function IsPasswordSafe(string $pass){
        return boolean;
    }

    /**
     * Indique le nombre de travail par jour pour une personne.
     *
     *
     * @return int Nombre d'heures
     */
    public function GetWorkHoursByDay(){
        return int;
    }
}