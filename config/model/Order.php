<?php

class Order {
    public $_id;
    public $_id_user;
    public $_date;

    public function __construct($_id,  $_id_user, $_date) {
        $this->_id = $_id;
        $this->_id_user = $_id_user;
        $this->_date = $_date;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }
    
    public function getIdUser() {
        return $this->_id_user;
    }
    
    public function setUserId($id_user) {
        $this->_id_user = $id_user;
    }

    public function getDate() {
        return $this->_date;
    }
    
    public function setDate($date) {
        $this->_date = $date;
    }

}