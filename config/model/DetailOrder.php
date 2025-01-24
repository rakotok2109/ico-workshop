<?php

class DetailOrder {
    public $_id;
    public $_quantity;
    public $_amount;
    public $_id_order;
    public $_id_product;

    public function __construct($_quantity, $_amount, $_id_order, $_id_product, $_id = NULL) {
        $this->_quantity = $_quantity;
        $this->_amount = $_amount;
        $this->_id_order = $_id_order;
        $this->_id_product = $_id_product;
        $this->_id = $_id;
    }

    public function getId(){
        return $this->_id;
    }

    public function setId($id){
        $this->_id = $id;
    }
    
    public function getidOrder(){
        return $this->_id_order;
    }
    
    public function getidProduct(){
        return $this->_id_product;
    }

    public function getQuantity(){
        return $this->_quantity;
    }

    public function getAmount(){
        return $this->_amount;
    }

    public function setQuantity($quantity){
        $this->_quantity = $quantity;
    }

    public function setAmount($amount){
        $this->_amount = $amount;
    }

    public function setIdOrder($id_order){
        $this->_id_order = $id_order;
    }

    public function setIdProduct($id_product){
        $this->_id_product = $id_product;
    }
}