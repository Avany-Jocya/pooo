<?php
class Voiture {
    private string $marque;
    private string $modele;
    private string $couleur;
    private int $nbPortes;
    private bool $estElectrique;

    public function __construct()
    {
        
    }

    public function hydrate(string $marque,string $modele, string $couleur, int $nbPortes, bool $estElectrique){
        $this->marque = $marque;
        $this->modele = $modele;
        $this->couleur = $couleur;
        $this->nbPortes = 5;  // Valeur par defaut
        $this->estElectrique = false;  // Valeur par defaut
    }

    public function afficherVoiture(){
        echo "La voiture est une ". $this->marque .".</br>";
        echo "De modèle ". $this->modele .".</br>";
        echo "Elle a la couleur ". $this->couleur .".</br>";
        echo "Nombre de portes " . $this->nbPortes.".</br>";
        if ($this->estElectrique){
                echo "La voiture est électrique.". "</br>" ;
            }else {
                echo "La voiture n'est pas électrique."."</br>";
            }
            echo "**************************************</br>";
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

//  notre logique
// $voiture1 = new Voiture();
// $voiture1->setCouleur("verte");
// echo $voiture1->getCouleur() ."</br>";
// $voiture1->hydrate("Marque", "Modele", "Bleue", 5, true);
// echo $voiture1->getModele()."</br>";

// // affichage conditionnel
// if ($voiture1->getEstElectrique()){
//     echo "La voiture est électrique.". "</br>" ;
// }else {
//     echo "La voiture n'est pas électrique."."</br>";
// }

// // affichage ternaire
// echo ($voiture1->getEstElectrique()) ? "La voiture est electrique." : "La voiture n'est pas electrique.";
$voiture1 = new Voiture();
$voiture2 = new Voiture();
$voiture3 = new Voiture();

//  hydratation
$voiture1->hydrate("Renault","Clio", "bleu",5,false);
$voiture2->hydrate("Peugeot", "308", "verte", 5, false);
$voiture3->hydrate("Toyota", "Yaris", "rouge", 5, false);
$voiture3->setNbPortes(3);
$voiture3->setEstElectrique(true);

$tab = [$voiture1, $voiture2, $voiture3];

for ($i=0; $i < count($tab); $i++) { 
    $tab[$i]->afficherVoiture();
}

foreach ($tab as $voiture) {
    $voiture->afficherVoiture();
}

afficherVoitureParMarque($tab, "Renault");
function afficherVoitureParMarque($tab, $marque) {
    echo "*****************</br>
    Voici la(les) voitures de la marque ". $marque . "</br>";
    for ($i=0; $i <count($tab); $i++){
        if ($tab[$i]->getMarque() === $marque ){
            $tab[$i]->afficherVoiture();
        }
    }
}
?>