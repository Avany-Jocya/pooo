<?php

class ParcAuto
{
    private string $nom;
    private string $adresse;
    public array $voitures = [];

    public function __construct($nom, $adresse)
    {
        $this->nom = $nom;
        $this->adresse = $adresse;
    }

    public function ajouterVoiture($voiture)
    {
        $this->voitures[] = $voiture;
    }

    public function afficherVoitureMarque(string $marqueDemande)

        {
            $listeVoitures = "";
            $count = 0;

            foreach ($this->voitures as $voiture) {
                if ($voiture->getMarque() === $marqueDemande) {
                    $listeVoitures .= (string)$voiture;
                    $count++;
                }
            }
            $pluriel = $count > 1;
            $msg = ($pluriel) ? "Voici les " : "Voici la ";
            $msg .= "voiture";
            $msg .= ($pluriel) ? "s" : "";
            $msg .= " ayant pour modèle $marqueDemande : </br>";
            $msg .= "**************************</br>";
            $msg .= "</br>" . $listeVoitures;
            echo $msg;
        }


}

class Voiture {
    
    private string $marque;
    private string $modele;
    private string $couleur;
    private int $nbPortes;
    
    private bool $estElectrique;
    private float $prixTtc;
    public const MINI = 3;
    public const NORMAL = 5;
    public const TAUX_TVA = 0.2;

    public function __construct(string $marque, string $modele, string $couleur, string $type, bool $estElectrique, float $prixHt)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->estElectrique = $estElectrique;
        if (strtolower($type) === 'normal') {
            $this->nbPortes = self::NORMAL;
        } else if (strtolower($type) === 'mini') {
            $this->nbPortes = self::MINI;
        } else {
            echo "Pas un bon type";
        }
        $this->prixTtc = $prixHt + $prixHt * self::TAUX_TVA;

    }

    public function afficherDetails()
    {
        $estElectriqueTernaire = $this->estElectrique === true ? 'electrique.' : 'non electrique.';
        echo "{$this->marque} {$this->modele} {$this->couleur} possède {$this->nbPortes}, est {$estElectriqueTernaire} et coûte {$this->prixTtc}.";
    }

    
    public function __toString()
    {
        $msg = "Marque : " . $this->marque . ".</br>
                Modèle : " . $this->modele . ".</br>
                Couleur : " . $this->couleur . ".</br>
                Nombre de portes : " . $this->nbPortes . ".</br>";
        $msg .= (isset($this->prixTtc)) ? "Prix TTC : " . $this->prixTtc . "</br>" : "Pas de prix renseigné</br>";
        if ($this->estElectrique) {
            $msg .= "La voiture est electrique.</br>";
        } else {
            $msg .= "La voiture n'est pas electrique.</br>";
        }
        $msg .= "**************************</br>";
        return $msg;
    }


    public function setMarque(string $marque)
    {
        $this->marque = $marque;
    }

    public function getMarque()
    {
        return $this->marque;
    }
}

$voiture1 = new Voiture("Dacia", "Duster", "noire", "normal", false, 10000);
$voiture2 = new Voiture("Toyota", "jesaispas", "rouge", "mini", true, 14000);
$voiture3 = new Voiture("Toyota", "idontknow", "rouge", "mini", true, 110000);
$voiture4 = new Voiture("Peugeot", "204", "noire", "normal", true, 12000);

$parcAuto = new ParcAuto("unnom", "uneadresse");

$parcAuto->ajouterVoiture($voiture1);

echo '<pre>';
print_r($parcAuto->voitures);
echo '</pre>';

echo '</br>';



$parcAuto->ajouterVoiture($voiture2);

echo '<pre>';
print_r($parcAuto->voitures);
echo '</pre>';

echo '</br>';

$parcAuto->ajouterVoiture($voiture3);

echo '<pre>';
print_r($parcAuto->voitures);
echo '</pre>';

echo '</br>';

$parcAuto->afficherVoitureMarque("Toyota");

echo '</br><button><a href="./index.php">Retour</a></button>';

?>