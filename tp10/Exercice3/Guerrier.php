<?php
class Guerrier {
    private $id;
    private $nom;
    private $degats;

    public function __construct($id, $nom, $degats) {
        $this->id = $id;
        $this->nom = $nom;
        $this->degats = $degats;
    }

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getDegats() {
        return $this->degats;
    }

    public function setDegats($degats) {
        $this->degats = $degats;
    }

    public function frapper(Guerrier $autreGuerrier, $conn) {
        $nouveaux_degats = $autreGuerrier->getDegats() + 5;
        $autreGuerrier->setDegats($nouveaux_degats);

        $stmt = $conn->prepare("UPDATE guerriers SET degats = ? WHERE id = ?");
        $stmt->bind_param("ii", $nouveaux_degats, $autreGuerrier->getId());
        $stmt->execute();

        if ($nouveaux_degats >= 100) {
            $stmt = $conn->prepare("DELETE FROM guerriers WHERE id = ?");
            $stmt->bind_param("i", $autreGuerrier->getId());
            $stmt->execute();
            echo "C'est fini ! {$autreGuerrier->getNom()} est mort.";
        } else {
            echo "{$autreGuerrier->getNom()} a été attaqué, il a maintenant {$nouveaux_degats}/100 points de dégâts.<br>";
        }
    }
}
?>