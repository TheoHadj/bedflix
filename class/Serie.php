<?php
class Serie extends Content {
    private $saisons;

    public function __construct($id, $titre, $description, $affiche, $lien, $saisons = []) {
        parent::__construct($id, $titre, $description, $affiche, $lien);
        $this->saisons = $saisons;
    }

    public function getSaisons() {
        return $this->saisons;
    }

    public function setSaisons($saisons) {
        $this->saisons = $saisons;
    }

    public function display() {
        return "<p>Film: {$this->getTitre()} ({$this->duree} min)</p>";
    }
}



//    $query = $db->prepare("INSERT INTO `series` (`id_serie`, `titre_serie`, `description_serie`, `affiche_serie`, `lien_serie`) VALUES (NULL, 'abc', 'abc', 'abc', 'abc')");
