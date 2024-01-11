<?php

class Bibliotheque
{
    private array $romans;
    private array $bds;
    private array $policiers;
    private array $nonClasses;

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
        $typeLivre = $nouveauLivre->getType();
        switch ($typeLivre) {
            case 'roman':
                $this->romans[] = $nouveauLivre;
                break;
            case 'bd':
                $this->bds[] = $nouveauLivre;
                break;
            case 'policier':
                $this->policiers[] = $nouveauLivre;
                break;
            default:
                $this->nonClasses[] = $nouveauLivre;
                break;
        }
    }

    public function __toString()
    {
        $txt = "";
        $txt .= "############## Romans #############</br>";
        if (isset($this->romans)) {
            for ($i = 0; $i < count($this->romans); $i++) {
                $txt .= $this->romans[$i];
            }
        } else {
            $txt .= "Pas de romans</br>";
        }

        $txt .= "############## Bds #############</br>";
        if (isset($this->bds)) {
            foreach ($this->bds as $bd) {
                $txt .= $bd;
            }
        } else {
            $txt .= "Pas de bande dessinée</br>";
        }
        $txt .= "############## Policiers #############</br>";
        if (isset($this->policiers)) {
            for ($i = 0; $i < count($this->policiers); $i++) {
                $txt .= $this->policiers[$i];
            }
        } else {
            $txt .= "Pas de roman policier</br>";
        }
        $txt .= "############## Non classés #############</br>";
        if (isset($this->nonClasses)) {
            foreach ($this->nonClasses as $livre) {
                $txt .= $livre;
            }
        } else {
            $txt .= "Pas de livre non classé</br>";
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
    private string $type = "Non classé";


    public function __construct(string $titre, int $nbPages, string $couleurCouverture, bool $estTraduitEnAnglais)
    {
        $this->titre = $titre;
        $this->nbPages = $nbPages;
        $this->couleurCouverture = $couleurCouverture;
        $this->estTraduitEnAnglais = $estTraduitEnAnglais;
    }

    public function createTypeLivre($nouveauType)
    {
        $this->type = $nouveauType;
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

    // /**
    //  * Get the value of couleurCouverture
    //  *
    //  * @return string
    //  */
    // public function getCouleurCouverture(): string
    // {
    //     return $this->couleurCouverture;
    // }

    // /**
    //  * Set the value of couleurCouverture
    //  *
    //  * @param string $couleurCouverture
    //  *
    //  * @return self
    //  */
    // public function setCouleurCouverture(string $couleurCouverture): self
    // {
    //     $this->couleurCouverture = $couleurCouverture;
    //     return $this;
    // }

    // /**
    //  * Get the value of estTraduitEnAnglais
    //  *
    //  * @return bool
    //  */
    // public function getEstTraduitEnAnglais(): bool
    // {
    //     return $this->estTraduitEnAnglais;
    // }

    // /**
    //  * Set the value of estTraduitEnAnglais
    //  *
    //  * @param bool $estTraduitEnAnglais
    //  *
    //  * @return self
    //  */
    // public function setEstTraduitEnAnglais(bool $estTraduitEnAnglais): self
    // {
    //     $this->estTraduitEnAnglais = $estTraduitEnAnglais;
    //     return $this;
    // }

    /**
     * Get the value of type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    // /**
    //  * Set the value of type
    //  *
    //  * @param string $type
    //  *
    //  * @return self
    //  */
    // public function setType(string $type): self
    // {
    //     $this->type = $type;
    //     return $this;
    // }
}

$l1 = new Livre("titre", 12, "bleue", false);
$l1->createTypeLivre("roman");
$l2 = new Livre("roman", 12, "bleue", false);
$l2->createTypeLivre("bd");
$l2->createTypeLivre("policier");
$l3 = new Livre("policier", 12, "bleue", false);
$l3->createTypeLivre("bd");

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
