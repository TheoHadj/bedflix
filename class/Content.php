<?php

abstract class Content {
    protected $id;
    protected $titre;
    protected $description;
    protected $affiche;
    protected $lien;

    public function __construct($id, $titre, $description, $affiche, $lien) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->affiche = $affiche;
        $this->lien = $lien;
        
    }

    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getAffiche() {
        return $this->affiche;
    }

    public function getLien() {
        return $this->lien;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setAffiche($affiche) {
        $this->affiche = $affiche;
    }

    public function setLien($lien) {
        $this->lien = $lien;
    }

}
