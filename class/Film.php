<?php
class Film extends Content {
    private $duree;

    public function __construct($id, $titre, $description, $affiche, $lien, $duree) {
        parent::__construct($id, $titre, $description, $affiche, $lien);
        $this->duree = $duree;
    }

    public function getDuree() {
        return $this->duree;
    }

    public function setDuree($duree) {
        $this->duree = $duree;
    }

    public function display() {
        return "<p>Film: {$this->getTitre()} ({$this->duree} min)</p>";
    }
}
