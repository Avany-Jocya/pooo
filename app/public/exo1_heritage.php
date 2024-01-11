<?php
class Personnage {
    private string $nom;
    private string $classe;
    protected int $attaque;
    protected int $pv;
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
        return $this->pv / 100 * $this->attaque ;
    }
    public function afficherDegats(){
        echo "Dégats infligés " . "par " . $this->nom . " : " . $this->calculDegat(), " dégats"; 
    }
    public function __toString()
    {
        $txt = "";
        $txt .= "Mon nom est " . $this->nom . ".</br>";
        $txt .= "Ma classe est " . $this->classe . "</br>";
        $txt .= "J'inflige " . $this->calculDegat() . " dégâts.</br>";
        $txt .= "J'ai " . $this->pv . " points de vie.</br>";
        $txt .= ($this->forceDuBien) ? "Je fais partie des forces du bien." : "Je ne fais pas partie des forces du mal.";
        $txt .= "</br>";
        return $txt;
    }
}

class Humain extends Personnage {
    private string $level;
    public function __construct(string $nom,string $classe,int $attaque,int $pv,bool $forceDuBien, int $level)
    {
        parent::__construct($nom,$classe, $attaque, $pv, $forceDuBien);
        $this->level = $level;
    }

    public function __toString()
    {
        $txt = "";
        $txt .= parent::__toString();
        $txt .= "Level : " . $this->level . "</br>";
        $txt .= "</br>*******************************</br></br>";
        return $txt;
    }
    public function gagneUnNiveau(){
        $this->level++;
    }
    public function modifStats(int $attaque, $pv){
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->afficherDegats();
        echo "</br>J'ai " . $this->pv . " points de vie.</br>";

    }
}

class Zombie extends Personnage{
    private int $vitesse;
    const degat = 10;

    public function __construct(string $nom,string $classe,int $attaque,int $pv,bool $forceDuBien, int $vitesse)
    {
        parent::__construct($nom,$classe, $attaque, $pv, $forceDuBien,);
        $this->vitesse = $vitesse;
    }

    public function zombieEnApproche(){
        echo "Zombie " . $this->nom . " en approche"; 
    }

    public function __toString()
    {
        $txt = "";
        $txt= "</br>Zombie en approche!</br></br>";
        $txt .= parent::__toString();
        $txt .= "Vitesse : " . $this->vitesse . "</br>";
        $txt .= "</br>*******************************</br></br>";
       
        return $txt;
    }
    public function augmenteVitesse(){
        $this->vitesse ++;
    }
}
$perso1= new Humain ("Seonghwa","Mage",100,50,true,2);
$perso2= new Humain("Bangchan","Mage",85,75,false,3);
$perso3= new Humain("J-hope","Hobbit",75, 47, true,2);
$perso4= new Humain("Vernon","Chevalier",110, 87, false,1);


$zombie1 = new Zombie ("Avany","Zombie",100,10,false,90);
$zombie2 = new Zombie ("Orlane","Zombie",100,10,false,90);

$zombies=[$zombie1,$zombie2];
$personnages=[$perso1, $perso2, $perso3, $perso4];

// $perso1->modifStats(10,30);

foreach($personnages as $personnage) {
    echo $personnage;
}

foreach($zombies as $zombie) {
    echo $zombie;
}


//Test de la méthode afficherDegats();
// $perso1->afficherDegats();
// echo "</br>";
// $perso2->afficherDegats();
// echo "</br>";
// $perso3->afficherDegats();
// echo "</br>";
// $perso4->afficherDegats();
// echo "</br>";

// echo $perso1 ."</br>";
// echo $perso2 ."</br>";
// echo $perso3 ."</br>";
// echo $perso4 ."</br>";
?>