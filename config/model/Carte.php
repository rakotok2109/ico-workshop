<?php

class Card{
    private $_id;
    private $_type;
    private $_nom;
    private $_couleur;
    private $_dos;
    private $_role_de_carte;
    private $_path;

    public function __construct($_type, $_nom, $_couleur, $_dos = 0, $_role_de_carte, $_path,$_id = NULL){
        $this->_type = $_type;
        $this->_nom = $_nom;
        $this->_couleur = $_couleur; 
        $this->_dos = $_dos;
        $this->_role_de_carte = $_role_de_carte;
        $this->_path = $_path; 
        $this->_id = $_id;
    }

    // Getters
    public function getId() {
        return $this->_id;
    }

    public function getType() {
        return $this->_type;
    }

    public function getNom() {
        return $this->_nom;
    }

    public function getCouleur() {
        return $this->_couleur;
    }

    public function getDos() {
        return $this->_dos;
    }

    public function getRoleDeCarte() {
        return $this->_role_de_carte;
    }

    public function getPath() {
        return $this->_path;
    }

    // Setters
    public function setId($id) {
        $this->_id = $id;
    }

    public function setType($type) {
        $this->_type = $type;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    public function setCouleur($couleur) {
        $this->_couleur = $couleur;
    }

    public function setDos($dos) {
        $this->_dos = $dos;
    }

    public function setRoleDeCarte($role_de_carte) {
        $this->_role_de_carte = $role_de_carte;
    }

    public function setPath($path) {
        $this->_path = $path;
    }
}
