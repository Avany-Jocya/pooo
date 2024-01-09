<?php
// echo'Notre première classe : </br>';
// Attention => aucune protection, aucun typage

class Personnage {
    public $nom;
    private $age;
    private $sexe;

    // constructeur  => exécuté même si vide
    public function __construct($nom, $age, $sexe)
    {
        // nos attributs
        $this->nom = $nom;
        $this->age=$age;
        $this->sexe = $sexe;
    }

    public function getAge() {
        return $this->age;
    }


    public function setAge($nouvelAge) {
        $this->age = $nouvelAge;
    }

    public function getSexe() {
        return $this->sexe;
    }


    public function setSexe($nouveauSexe) {
        $this->sexe = $nouveauSexe;
    }

    public function direBonjour() {
        echo 'Salut je m\'appelle ' .$this->nom . ".</br>J'ai" . $this->age . " ans";
    }
}


// logique 
$perso1 = new Personnage("test", 12, true); // création objet à partir du modèle
echo $perso1->nom."</br>";  // acces attribut
$perso1 -> nom= "Gandalf";   // modification de l'attribut
echo $perso1->nom."</br>";  // acces attribut
// echo $perso1->age;  fatal error !
$perso1->setAge(34)."</br>";      // appel méthode pour modifier l'age
echo $perso1->getAge()."</br>";
$perso1->setSexe(true)."</br>";      // appel méthode pour modifier l'age
echo $perso1->getSexe()."</br>";
$perso1->direBonjour();     // appel d'une méthode





?>