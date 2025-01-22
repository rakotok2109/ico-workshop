<?php

class News {
    private $title_;
    private $wording_;
    private $date_;
    private $id_;

    public function __construct($title, $wording, $date, $id = null) {
        $this->title_ = $title;
        $this->wording_ = $wording;
        $this->date_ = $date;
        $this->id_ = (int)$id;
    }

    public function getId() {
        return $this->id_;
    }

    public function setId($id) {
        $this->id_ = $id;
    }

    public function getTitle() {
        return $this->title_;
    }

    public function setTitle($title) {
        $this->title_ = $title;
    }

    public function getWording() {
        return $this->wording_;
    }

    public function setWording($wording) {
        $this->wording_ = $wording;
    }

    public function getDate() {
        return $this->date_;
    }

    public function setDate($date) {
        $this->date_ = $date;
    }

}