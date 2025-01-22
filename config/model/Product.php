<?php 

class Product {
    private $name_;
    private $price_;
    private $description_;
    private $image_;
    private $id_;

    public function __construct($name, $price, $description, $image, $id = null) {
        $this->name_ = $name;
        $this->price_ = $price; 
        $this->description_ = $description;
        $this->image_ = $image;
        $this->id_ = (int)$id;
    }

    public function getId() {
        return $this->id_;
    }

    public function setId($id) {
        $this->id_ = $id;
    }

    public function getName() {
        return $this->name_;
    }

    public function setName($name) {
        $this->name_ = $name;
    }

    public function getPrice() {
        return $this->price_;
    }

    public function setPrice($price) {
        $this->price_ = $price;
    }

    public function getDescription() {
        return $this->description_;
    }

    public function setDescription($description) {
        $this->description_ = $description;
    }

    public function getImage() {
        return $this->image_;
    }

    public function setImage($image) {
        $this->image_ = $image;
    }
}