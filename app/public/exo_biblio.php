<?php

class Bibliotheque
{
    private string $nom;
    private string $adresse;
    private array $livres;

    public function __construct(string $nom = "La Boussole", string $adresse = "Montigny en Gohelle")
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function afficherTousLesLivres()
    {
        echo "Tous les livres de la bibliothèque :</br>******************</br>";
        foreach ($this->livres as $livre) {
            echo $livre;
        }
    }

    public function ajouterUnLivre($nouveauLivre)
    {
        $this->livres[] = $nouveauLivre;
    }

    public function afficherLivresParType($type)
    {
        echo "Voici les livres du genre " . $type . " :</br>
          ****************** </br>";
        for ($i = 0; $i < count($this->livres); $i++) {
            if ($this->livres[$i]->getType() === $type) {
                echo $this->livres[$i];
            }
        }
    }
}

class Livre
{
    // attributs
    private string $type;
    private string $titre;
    private string $auteur;
    private int $nbPages;
    private bool $estTraduitEnAnglais;

    public function __construct(string $type, string $titre, string $auteur, int $nbPages)
    {
        $this->type = $type;
        $this->titre = $titre;
        $this->auteur = $auteur;
        $this->nbPages = $nbPages;
        $this->estTraduitEnAnglais = false;
    }

    public function __toString()
    {
        $msg = "Type : " . $this->type . ".</br>
              Titre : " . $this->titre . ".</br>
              Auteur : " . $this->auteur . ".</br>
              Nombre de pages : " . $this->nbPages . ".</br>";
        // affichage traduction
        if ($this->estTraduitEnAnglais) {
            $msg .= "Cet ouvrage existe en version anglaise.</br>";
        } else {
            $msg .= "Cet ouvrage n'a pas de version anglaise.</br>";
        }
        $msg .= "<span style='color:blue;font-weight:bold'>***************************</br></span>";
        return $msg;
    }

    public function getType()
    {
        return $this->type;
    }
    public function setType($newType)
    {
        $this->type = $newType;
    }
    public function getTitre()
    {
        return $this->titre;
    }
    public function setTitre($newTitre)
    {
        $this->titre = $newTitre;
    }
    public function getAuteur()
    {
        return $this->auteur;
    }
    public function setAuteur($newAuteur)
    {
        $this->auteur = $newAuteur;
    }
    public function getNbPages()
    {
        return $this->nbPages;
    }
    public function setNbPages($newNbPage)
    {
        $this->nbPages = $newNbPage;
    }
    public function getEstTraduitEnAnglais()
    {
        return $this->estTraduitEnAnglais;
    }
    public function setEstTraduitEnAnglais($newEstTraduitEnAnglais)
    {
        $this->estTraduitEnAnglais = $newEstTraduitEnAnglais;
    }
}

$livre1 = new Livre("Romans", "Metamorphose", "Kafka",240);
$livre1->setEstTraduitEnAnglais(true);
$livre2 = new Livre("Romans", "Si ça saigne", "King", 346);
$livre2->setEstTraduitEnAnglais(true);
$livre3 = new Livre("BD", "Blake et Mortimer", "François Schuiten, Jaco Van Dormael, Thomas Gunzig", 50);
$livre3->setEstTraduitEnAnglais(true);
$livre4 = new Livre("BD", "Rahan", "Roger Lécureux, André Chéret", 50);
$livre4->setEstTraduitEnAnglais(true);
$livre5 = new Livre("Policiers", "Dors ma jolie", "Mary Hyggins Clark", 287);
$livre5->setEstTraduitEnAnglais(true);
$livre6 = new Livre("Policiers", "La Faille", "*Franck Thilliez", 310);
$livre6->setEstTraduitEnAnglais(false);

$biblio = new Bibliotheque();

$biblio->ajouterUnLivre($livre1);
$biblio->ajouterUnLivre($livre2);
$biblio->ajouterUnLivre($livre3);
$biblio->ajouterUnLivre($livre4);
$biblio->ajouterUnLivre($livre5);
$biblio->ajouterUnLivre($livre6);

$biblio->afficherTousLesLivres();
// $biblio->afficherLivresParType("Romans");
?>
