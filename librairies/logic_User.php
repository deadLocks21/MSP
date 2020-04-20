<?php
/**
 * Classe représentant un utilisateur.
 */
class User{
    /**
     * @var int ID de l'utilisateur.
     */
    private $ID;
    /**
     * @var string Nom de l'utilisateur.
     */
    private $Name;
    /**
     * @var string Pseudo
     */
    private $Login;
    /**
     * @var string Hash du mot de passe.
     */
    private $PasswordHash;


    /**
     * User constructor.
     * @param int $aID ID de l'utilisateur.
     */
    public function __construct(int $aID){
        $this->setID($aID);
    }


    // ASSESSEURS DES ATTRIBUTS DE LA CLASS
    /**
     * Assesseur de l'attribut ID.
     *
     *
     * @return int ID de l'user.
     */
    public function getID(){
        return $this->ID;
    }

    /**
     * Assesseur de l'attribut Name.
     *
     *
     * @return string Nom de l'user.
     */
    public function getName(){
        return $this->Name;
    }

    /**
     * Assesseur de l'attribut Login.
     *
     *
     * @return string Login de l'user.
     */
    public function getLogin(){
        return $this->Login;
    }

    /**
     * Assesseur de l'attribut PasswordHash.
     *
     *
     * @return string Hass du password de l'utilisateur.
     */
    public function getPasswordHash(){
        return $this->PasswordHash;
    }


    // MUTATEURS DES ATTRIBUTS DE LA CLASS
    /**
     * Mutateur de l'attribut ID.
     *
     *
     * @param int $aID ID de l'user.
     */
    private function setID(int $aID){
        $this->ID = $aID;
    }

    /**
     * Mutateur de l'attribut Name.
     *
     *
     * @param string $aName Nom de l'user.
     */
    public function setName($aName){
        $this->Name = $aName == null ? '' : $aName;
    }

    /**
     * Mutateur de l'attribut Login.
     *
     *
     * @param string $aLogin Login de l'user.
     */
    public function setLogin($aLogin){
        $this->Login = $aLogin == null ? '' : $aLogin;
    }

    /**
     * Mutateur de l'attribut PasswordHash.
     *
     *
     * @param string $aPasswordHash Hash du mdp de l'utilisateur.
     */
    public function setPasswordHash($aPasswordHash){
        $this->PasswordHash = $aPasswordHash == null ? '' : $aPasswordHash;
    }
}