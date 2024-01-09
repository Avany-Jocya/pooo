<?php

class User
{
    private string $identifiant;
    private string $email;
    private string $password ; 

    // public function __construct(string $identifiant = "test", string $email = "test@test.fr", string $password = "12345")
    // {
    //     $this->identifiant = $identifiant;
    //     $this->email = $email;
    //     // $this->password = $password;
    //     // $this->password = password_hash($password,PASSWORD_BCRYPT);
    // }
    public function setPassword($motDePasse)
    {
        $this->password = password_hash($motDePasse, PASSWORD_ARGON2I);
        return $this;
    }

    // public function __toString() {
    //     $msg ="";
    //     echo "Identifiant : " . $this->identifiant . ".</br> Email : " . $this->email . "</br> Mot de passe : " . $this->password . "</br>";
    //     return $msg;
    // }

    // /**
    //  * Get the value of identifiant
    //  */
    // public function getIdentifiant()
    // {
    //     return $this->identifiant;
    // }

    // /**
    //  * Set the value of identifiant
    //  *
    //  * @return  self
    //  */
    // public function setIdentifiant($identifiant)
    // {
    //     $this->identifiant = $identifiant;

    //     return $this;
    // }

    // /**
    //  * Get the value of email
    //  *
    //  * @return string
    //  */
    // public function getEmail(): string
    // {
    //     return $this->email;
    // }

    // /**
    //  * Set the value of email
    //  *
    //  * @param string $email
    //  *
    //  * @return self
    //  */
    // public function setEmail(string $email): self
    // {
    //     $this->email = $email;
    //     return $this;
    // }

    // /**
    //  * Get the value of password
    //  *
    //  * @return string
    //  */
    public function getPassword(): string
    {
        return $this->password;
    }

    // /**
    //  * Set the value of password
    //  *
    //  * @param string $password
    //  *
    //  * @return self
    //  */
    // public function setPassword(string $password): self
    // {
    //     $this->password = $password;
    //     return $this;
    // }
}

$utilisateur = new User();
$utilisateur->setPassword("12345");
echo $utilisateur->getPassword();
// echo $utilisateur;