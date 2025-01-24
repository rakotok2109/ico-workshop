<?php

class Card {
    private $_id;
    private $_name;
    private $_type;
    private $_description;
    private $_image;

    public function __construct($_name, $_type, $_description, $_image, $_id = NULL){
        $this->_name = $_name;
        $this->_type = $_type;
        $this->_description = $_description;
        $this->_image = $_image; 
        $this->_id = $_id;
    }

    public function getId() {
        return $this->_id;
    }

    public function getType() {
        return $this->_type;
    }

    public function getName() {
        return $this->_name;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function getImage() {
        return $this->_image;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function setType($type) {
        $this->_type = $type;
    }

    public function setName($name) {
        $this->_name = $name;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function setImage($image) {
        $this->_image = $image;
    }
}