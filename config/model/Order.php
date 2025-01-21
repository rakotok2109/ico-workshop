<?php

class Order {
    public $id;
    public $id_user;
    public $date;

    public function __construct($id, $date, $id_user) {
        $this->id = $id;
        $this->id_user = $id_user;
        $this->date = $date;
        
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getIdUser() {
        return $this->id_user;
    }
    
    public function setUserId($id_user) {
        $this->id_user = $id_user;
    }

    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }

}
