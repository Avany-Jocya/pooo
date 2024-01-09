<?php
class Voiture {
    private string $marque;
    private string $modele;
    private string $couleur;
    private int $nbPortes;
    private bool $estElectrique;
    private int $prixTTC;
    public static array $voitures; 

    const mini = 3;
    const normal = 5;
    const TVA = 20;



    public function __construct(string $marque, string $modele, string $couleur,int $nbPortes, int $prixHT)
    {
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nbPortes = 5;  // Valeur par defaut
        $this->estElectrique = false;  // Valeur par defaut 
        // prixTTC = calcul avec constante TVA
        $this->prixTTC = $prixHT + $prixHT * self::TVA/100;
        // $this->voitures = $voitures;
        self::$voitures[] = $this;

    }
    public static function afficherVoitureParMarque(string $marque): void{
        echo "Voici la(les) voiture(s) de la marque". $marque . ":</br>-------------------------------</br>";
        for ($i=0; $i < count(self::$voitures); $i++) { 
            if (self::$voitures[$i]->getMarque() === $marque) {
                echo self::$voitures[$i];
            }
        }
    }

    public function __toString()
    {
        $msg = "Marque : " . $this->marque . "</br>
              Modèle : " . $this->modele . "</br>
              Couleur : " . $this->couleur . "</br>
              Nombre de Portes : " . $this->nbPortes . "</br>";
        $msg .= (isset($this->prixTTC)) ?  "Prix TTC : " . $this->prixTTC . "</br>" : "Pas de prix renseigné</br>";
        $msg .= ($this->getEstElectrique()) ? "La voiture est électrique.</br>" . "--------------------------------</br>" : "La voiture n'est pas électrique.</br>" . "-------------------------------</br>";
        return $msg;
    }

 

    public function getMarque():string{
        return $this->marque;
    }

    public function setMarque($nouvelleMarque):void{
        $this->marque = $nouvelleMarque;
    }

    public function getModele(){
        return $this->modele;
    }

    public function setModele($nouveauModele){
        $this->modele = $nouveauModele;
    }

    public function getCouleur(){
        return $this->couleur;
    }

    public function setCouleur($nouvelleCouleur){
        $this->couleur = $nouvelleCouleur;
    }

    public function getNbPortes(){
        return $this->nbPortes;
    }

    public function setNbPortes($nouveauNbPortes){
        $this->nbPortes = $nouveauNbPortes;
    }

    /**
     * Get the value of estElectrique
     *
     * @return bool
     */
    public function getEstElectrique(): bool {
        return $this->estElectrique;
    }
    
    // public function getVoitures(){
    //     return $this->voitures;
    // }

    // public function setVoitures($voitures){
    //     $this->voitures = $voitures;
    // }

    /**
     * Set the value of estElectrique
     *
     * @param bool $estElectrique
     *
     * @return self
     */
    public function setEstElectrique(bool $estElectrique): self {
        $this->estElectrique = $estElectrique;
        return $this;
    }
}


// Appel des constantes (classe::const)
$voiture1 = new Voiture("Renault","Clio", "bleu",Voiture::mini,18000);
$voiture1->setEstElectrique(true);
$voiture2 = new Voiture("Peugeot", "308", "verte",Voiture::normal, 15000);
$voiture2->setEstElectrique(false);
$voiture3 = new Voiture("Toyota", "Yaris", "rouge",Voiture::normal, 17500);
$voiture3->setEstElectrique(true);
$voiture4 = new Voiture("Toyota", "Corolla", "or",Voiture::normal, 17500);
$voiture4->setEstElectrique(true);
$voiture5 = new Voiture("Renault", "Arkana", "violet",Voiture::normal, 37500);
$voiture5->setEstElectrique(true);
// $voitures = [$voiture1, $voiture2, $voiture3];



// $tab = [$voiture1, $voiture2, $voiture3];

// for ($i=0; $i < count(Voiture::$voitures); $i++) { 
//     echo Voiture::$voitures[$i];
// }

// foreach ($tab as $voiture) {
//     echo $voiture;
// }

// echo $voitures;
 Voiture::afficherVoitureParMarque("Renault");


?>
