<?php
/**
 * Enumération permettant de stocker les états d'une activité.
 */
class ActivityState{
    /**
     * Activité prévue.
     */
    const PLANNED='PLANNED';
    /**
     * Activité en cours.
     */
    const ONGOING='ONGOING';
    /**
     * Activité terminée.
     */
    const FINISHED='FINISHED';
    /**
     * Activité annulée.
     */
    const CANCELED='CANCELED';
}