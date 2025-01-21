<?php

class Product{
    public $id;
    public $nom;
    public $prix;
    public $description;
    public $image;


    public function __construct($id, $nom, $prix, $description, $image) {
        $this->id = $id;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->description = $description;
        $this->image = $image;

    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setPrix($prix) {
        $this->prix = $prix;
    }
    
    public function getPrix() {
        return $this->prix;
    }

    public function setDescription($description) {
        $this->description = $description;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setImage($image) {
        $this->image = $image;
    }
    
    public function getImage() {
        return $this->image;
    }


}