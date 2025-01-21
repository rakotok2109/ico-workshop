<?php

class DetailsOrder {
    public $id;
    public $id_order;
    public $id_produit;
    public $quantite;
    public $prix;

    public function __construct($id, $id_order, $id_produit, $quantite, $prix) {
        $this->id = $id;
        $this->id_order = $id_order;
        $this->id_produit = $id_produit;
        $this->quantite = $quantite;
        $this->prix = $prix;
    }

    public function getidOrder(){
        return $this->id_order;
    }
    
    public function getidProduit(){
        return $this->id_produit;
    }

    public function getQuantite(){
        return $this->quantite;
    }

    public function getPrix(){
        return $this->prix;
    }

    public function setQuantite($quantite){
        $this->quantite = $quantite;
    }

    public function setPrix($prix){
        $this->prix = $prix;
    }

    public function setIdOrder($id_order){
        $this->id_order = $id_order;
    }

    public function setIdProduit($id_produit){
        $this->id_produit = $id_produit;
    }
}
