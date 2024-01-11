<?php
echo 'Exercice n°1 :</br>';

class Personnage {
    private string $nom;
    private string $classe;
    private int $attaque;
    private int $pv;
    private bool $forceDuBien;


    public function __construct(string $nom,string $classe,int $attaque,int $pv,bool $forceDuBien)
    {
        $this->nom = $nom;
        $this->classe = $classe;
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->forceDuBien = $forceDuBien;
    }

    private function calculDegat() {
        return $this->pv / 100 * $this->attaque +1;
    }

    public function afficherDegats(){
        echo "Dégats infligés " . "par " . $this->nom . " : " . $this->calculDegat(), " dégats"; 
    }


    public function getNom(): string {
        return $this->nom;
    }

 
    public function setNom(string $nom): self {
        $this->nom = $nom;
        return $this;
    }

  
    public function getClasse(): string {
        return $this->classe;
    }

    public function setClasse(string $classe): self {
        $this->classe = $classe;
        return $this;
    }

    public function getAttaque(): int {
        return $this->attaque;
    }

    
    public function setAttaque(int $attaque): self {
        $this->attaque = $attaque;
        return $this;
    }

 
    public function getPv(): int {
        return $this->pv;
    }

 
    public function setPv(int $pv): self {
        $this->pv = $pv;
        return $this;
    }


    public function getForceDuBien(): bool {
        return $this->forceDuBien;
    }

 
    public function setForceDuBien(bool $forceDuBien): self {
        $this->forceDuBien = $forceDuBien;
        return $this;
    }
}
$perso1= new Personnage("Gandalf","Mage",100,50,true);
$perso2=new Personnage("Saruman","Mage",85,75,false);
$perso3= new Personnage("Frodon","hobbit",75, 47, true);
$perso4= new Personnage("Boromir","chevalier",110, 87, false);

//Test de la méthode afficherDegats();
$perso1->afficherDegats();
echo "</br>";
$perso2->afficherDegats();
echo "</br>";
$perso3->afficherDegats();
echo "</br>";
$perso4->afficherDegats();
echo "</br>";



?>