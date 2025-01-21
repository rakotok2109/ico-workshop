<?php 

class User {
    private $id_;
    private $name_;
    private $firstname_;
    private $password_;
    private $mail_;
    private $phone_;
    private $location_;
    private $role_;

    public function __construct($name, $firstname, $password, $mail, $phone, $location, $role, $id = null) {
        $this->name_ = $name;
        $this->firstname_ = $firstname;
        $this->password_ = $password;
        $this->mail_ = strtolower(trim($mail));
        $this->phone_ = $phone;
        $this->location_ = $location;
        $this->role_ = $role;
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

    public function getFirstname() {
        return $this->firstname_;
    }

    public function setFirstname($firstname) {
        $this->firstname_ = $firstname;
    }

    public function getPassword() {
        return $this->password_;
    }

    public function setPassword($password) {
        $this->password_ = $password;
    }

    public function getMail() {
        return $this->mail_;
    }

    public function setMail($email) {
        $this->mail_ = $mail;
    }

    public function getPhone() {
        return $this->phone_;
    }

    public function setPhone($phone) {
        $this->phone_ = $phone;
    }

    public function getLocation() {
        return $this->location_;
    }

    public function setLocation($location) {
        $this->location_ = $location;
    }


    public function getRole() {
        return $this->role_;
    }

    public function setRole($role) {
        $this->role_ = $role;
    }
}