<?php
// Classe ActivityWindow
class ActivityWindow{
    public function __construct(){
        echo "<!doctype html>
<html lang=\"fr\">
    <head>
        <meta charset=\"utf-8\">
        <title>Activities</title>
        <link rel=\"stylesheet\" href=\"style_sombre.css\">
    </head>
    <body>
        <p>Type d'activité : </p>

        <p>Résumé : </p>

        <p>Détails : </p>

        <p>Départ : </p>

        <p>Fin prévue : </p>
        <br />

        <form action=\"\">
            <p>Statut :</p>
            <p><input type=\"radio\" name=\"statut\" value=\"ONGOING\">En cours</p>
            <p><input type=\"radio\" name=\"statut\" value=\"PLANNED\">Prévue</p>
            <p><input type=\"radio\" name=\"statut\" value=\"FINISHED\">Terminée</p>
            <p><input type=\"radio\" name=\"statut\" value=\"CANCELED\">Annulée</p>

            <br /><br />
            <p><input type=\"submit\" value=\"Fermer\"></p>
        </form>
    </body>
</html>";
    }
}
