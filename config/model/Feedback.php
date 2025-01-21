<?php

class Feedback {
    private $firstname_;
    private $wording_;
    private $rate_;
    private $id_;

    public function __construct($firstname, $wording, $rate, $id = null) {
        $this->firstname_ = $firstname;
        $this->wording_ = $wording;
        $this->rate_ = $rate;
        $this->id_ = (int)$id;
    }

    public function getId() {
        return $this->id_;
    }

    public function setId($id) {
        $this->id_ = $id;
    }

    public function getFirstname() {
        return $this->firstname_;
    }

    public function setFirstname($firstname) {
        $this->firstname_ = $firstname;
    }

    public function getWording() {
        return $this->wording_;
    }

    public function setWording($wording) {
        $this->wording_ = $wording;
    }

    public function getRate() {
        return $this->rate_;
    }

    public function setRate($rate) {
        $this->rate_ = $rate;
    }

}