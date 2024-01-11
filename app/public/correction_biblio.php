<?php

class Bibliotheque
{
    private array $romans;
    private array $bds;
    private array $policiers;

    public function __construct()
    {
    }

    public function ajouterLivre(object $nouveauLivre)
    {
        // if ($nouveauLivre->getType() === "roman") {
        //     $this->romans[] = $nouveauLivre;
        // } else if ($nouveauLivre->getType() === "bd") {
        //     $this->bds[] = $nouveauLivre;
        // } else if ($nouveauLivre->getType() === "policier") {
        //     $this->policiers[] = $nouveauLivre;
        // }

        switch ($nouveauLivre->getType()) {
            case 'roman':
                $this->romans[] = $nouveauLivre;
                break;
            case 'bd':
                $this->bds[] = $nouveauLivre;
                break;
            case 'policier':
                $this->policiers[] = $nouveauLivre;
                break;
        }
    }

    public function __toString()
    {
        $txt = "";
        $txt .= "############## Romans #############</br>";
        for ($i = 0; $i < count($this->romans); $i++) {
            $txt .= $this->romans[$i];
        }
        $txt .= "############## Bds #############</br>";
        foreach ($this->bds as $bd) {
            $txt .= $bd;
        }
        $txt .= "############## Policiers #############</br>";
        for ($i = 0; $i < count($this->policiers); $i++) {
            $txt .= $this->policiers[$i];
        }
        return $txt;
    }
}

class Livre
{
    // attributs
    public string $titre;
    public int $nbPages;
    private string $couleurCouverture;
    private bool $estTraduitEnAnglais;
    private string $type;


    public function __construct(string $titre, int $nbPages, string $couleurCouverture, bool $estTraduitEnAnglais, string $type)
    {
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->couleurCouverture = $couleurCouverture;
        $this->estTraduitEnAnglais = $estTraduitEnAnglais;
        $this->type = $type;
    }

    private function traductionEnAnglais()
    {
        $this->estTraduitEnAnglais = true;
    }

    public function basculerEnAnglais()
    {
        $this->traductionEnAnglais();
        $this->ajouterPages(5);
        $this->changerCouleurCouverture("verte");
    }

    private function changerCouleurCouverture($nouvelleCouleur)
    {
        $this->couleurCouverture = $nouvelleCouleur;
    }
    


    public function __toString()
    {
        $txt = "";
        $txt .= "Livre : " . $this->titre . ".</br>";
        $txt .= "Nombre de pages : " . $this->nbPages . ".</br>";
        $txt .= "Couleur couverture : " . $this->couleurCouverture . ".</br>";
        // if ($this->estTraduitEnAnglais) {
        //     $txt .= "Livre traduit en anglais";
        // } else {
        //     $txt .= "Livre non traduit en anglais";
        // }
        // if ($this->estTraduitEnAnglais)
        //     $txt .= "Livre traduit en anglais";
        // else
        //     $txt .= "Livre non traduit en anglais";
        $txt .= ($this->estTraduitEnAnglais) ? "Livre traduit en anglais" : "Livre non traduit en anglais";
        $txt .= "</br>";
        return $txt;
    }

    public function ajouterPages($nbPagesAjoutees)
    {
        $this->nbPages += $nbPagesAjoutees;
        // $this->nbPages = $this->nbPages + $nbPagesAjoutees;
    }

    // public function getCouleurCouverture(): string {
    //     return $this->couleurCouverture;
    // }
    // public function setCouleurCouverture(string $couleurCouverture): self {
    //     $this->couleurCouverture = $couleurCouverture;
    //     return $this;
    // }

    // public function getEstTraduitEnAnglais(): bool {
    //     return $this->estTraduitEnAnglais;
    // }
    // public function setEstTraduitEnAnglais(bool $estTraduitEnAnglais): self {
    //     $this->estTraduitEnAnglais = $estTraduitEnAnglais;
    //     return $this;
    // }

    
    public function getType(): string
    {
        return $this->type;
    }

  
    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }
}

$l1 = new Livre("titre", 12, "bleue", false, "bd");
$l2 = new Livre("roman", 12, "bleue", false, "roman");
$l3 = new Livre("policier", 12, "bleue", false, "policier");

$maBibliotheque = new Bibliotheque();
$maBibliotheque->ajouterLivre($l1);
$maBibliotheque->ajouterLivre($l2);
$maBibliotheque->ajouterLivre($l3);
echo $maBibliotheque;

// echo $l1;
// $l1->ajouterPages(8);
// echo $l1;
// $l1->basculerEnAnglais();
// echo $l1;
?>

<?php
// Exercice:

// - création => pas de type

// - méthode pour modifier type
// private function changerDeType($nouveauType){
//         $this->type = $nouveauType;
//     }
$l1->setType("policier")."</br>";      // appel méthode pour modifier l'age
echo $l1->getType()."</br>";

// - par défaut => non classés

?>