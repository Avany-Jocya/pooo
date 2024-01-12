<?php
echo '<ul>
<li><a href="../index.php">Accueil</a></li>
</ul>';
echo 'Exercice 2 : heritage </br>';
echo "</br>";

class Jeu
{
    private string $nom;
    private array $humains;
    private array $zombies;

    public function __construct(string $nom)
    {
        $this->nom = $nom;
    }

    public function ajouterHumain(object $nouvelHumain)
    {
        // foreach ($humains as $humain) {
        $this->humains[] = $nouvelHumain;
        // }
    }
    public function ajouterZombie(object $nouveauZombie)
    {
        // foreach ($zombies as $zombie) {
        $this->zombies[] = $nouveauZombie;
        // }
    }
    public function __toString()
    {
        $txt = "";
        $txt .= "Nom du jeu : " . $this->nom . "</br>";
        if (isset($this->humains)) {
            foreach ($this->humains as $humain) {
                $txt .= $humain;
            }
        }
        if (isset($this->zombies)) {
            foreach ($this->zombies as $zombie) {
                $txt .= $zombie;
            }
            return $txt;
        }
    }
}

class Personnage
{
    protected string $nom;
    private string $classe;
    protected int $attaque; // pas public
    protected int $pv;
    private bool $forceDuBien;

    public function __construct(string $nom, string $classe, int $attaque, int $pv, bool $forceDuBien)
    {
        $this->nom = $nom;
        $this->classe = $classe;
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->forceDuBien = $forceDuBien;
    }

    private function calculDegat()
    {
        return $this->pv / 100 * $this->attaque;
    }

    public function afficherDegat()
    {
        $txt = "J'inflige " . $this->calculDegat() . " dégâts </br>";
        return $txt;
    }
    public function __toString()
    {
        $txt = "";
        $txt .= "Mon nom est " . $this->nom . ".</br>";
        $txt .= "Ma classe est " . $this->classe . "</br>";
        // $txt .= "J'inflige " . $this->calculDegat() . " dégâts.</br>";
        $txt .= "J'ai " . $this->pv . " points de vie.</br>";
        $txt .= ($this->forceDuBien) ? "Je fais partie des forces du bien.</br>" : "Je ne fais pas partie des forces du bien.</br>";
        return $txt;
    }
}

class Humain extends Personnage
{
    private int $level;

    public function __construct(string $nom, string $classe, int $attaque, int $pv, bool $forceDuBien, int $level)
    {
        parent::__construct($nom, $classe, $attaque, $pv, $forceDuBien);
        $this->level = $level;
    }

    public function gagneUnNiveau()
    {
        $this->level++;
    }

    public function modifStats(int $attaque, int $pv)
    {
        $this->attaque = $attaque;
        $this->pv = $pv;
        $this->afficherDegat(); // accessible avec $this 
        echo "</br> Mes points de vie sont de : " . $this->pv . "</br>";
    }

    public function __toString()
    {
        $txt = "";
        $txt .= parent::__toString();
        $txt .= parent::afficherDegat();
        $txt .= "Level : " . $this->level . "</br>-----------------------------------------------</br>";
        return $txt;
    }
}

class Zombie extends Personnage
{
    private int $vitesse;
    private const degats = 10;

    public function __construct(string $nom, string $classe, int $pv, bool $forceDuBien, int $vitesse)
    {
        parent::__construct($nom, $classe, self::degats, $pv, $forceDuBien);
        $this->vitesse = $vitesse;
    }

    public function modifVitesse(int $vitesse)
    {
        $this->vitesse = $vitesse;
        echo "</br> La vitesse de " . $this->nom . " est de : " . $this->vitesse;
    }

    public function __toString()
    {
        $txt = "";
        $txt .= "zombie en approche</br>";
        $txt .= parent::__toString();
        $txt .= "J'inflige " . $this->attaque . " dégâts.</br>";
        $txt .= "Vitesse : " . $this->vitesse . "</br>-----------------------------------------------</br>";
        return $txt;
    }
}

$perso1 = new Humain("Milo", "guerrier", 15, 100, true, 2);
$perso2 = new Humain("Tya", "archère", 5, 50, true, 3);
$perso3 = new Humain("Lili", "archère", 5, 55, false, 4);
$perso4 = new Humain("Gael", "voleur", 2, 10, false, 5);

$zombie1 = new Zombie("ZZZ", "zombie",  100, false, 5);
$zombie2 = new Zombie("Bang Chan", "zombie", 150, false, 4);
$zombie3 = new Zombie("Purple kiss", "zombie", 80, false, 3);
$zombie4 = new Zombie("Tzuyu", "zombie", 70, false, 1);
$zombie5 = new Zombie("Momo", "zombie", 90, false, 2);


// $perso1->modifStats(10, 30);
// $perso5->modifVitesse(20);

$monJeu = new Jeu("Z");
$monJeu->ajouterHumain($perso1);
$monJeu->ajouterZombie($zombie1);
$monJeu->ajouterZombie($zombie2);
$monJeu->ajouterZombie($zombie3);

echo $monJeu;
?>