class Personnage {
    constructor(nom, age, sexe) {
      this.nom = nom;
      this.age = age;
      this.sexe = sexe;
    }
  
    getNom() {
      return this.nom;
    }
    setNom(nom) {
      this.nom = nom;
    }
    getAge() {
      return this.age;
    }
    setAge(age) {
      this.age = age;
    }
    getSexe() {
      return this.sexe;
    }
    setSexe(sexe) {
      this.sexe = sexe;
    }
  
    direBonjour(){
      console.log("Bonjour, c'est moi : "+ this.nom);
    }
  }
  
  let perso1=new Personnage("Tyra", 22, false);
  console.log(perso1.getAge());
  perso1.direBonjour();
  perso1.setNom("Orlane");
  console.log(perso1.getNom());