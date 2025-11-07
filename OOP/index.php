<?php


//---------MODELLAZIONE-----------

    //classe genitore
    //dichiarazione di una classe Animale
    class Animale {
        //proprietà della classe
        public $nome;
        public $specie;
        public $peso;
        public $habitat;    

        //costruttore della classe
        public function __construct($nome, $specie, $peso, $habitat) {
            $this->nome = $nome;
            $this->specie = $specie;
            $this->peso = $peso;
            $this->habitat = $habitat;
        }

        //la Classe Animale può avere una funzione o più funct
        public function verso() {
            return "";
        }
    }

    //classe figlio Cane di Animale
    class Cane extends Animale {
        //override del metodo verso
        public function verso() {
            return "Abbaia";
        }
    }


    //classe figlio Gatto di Animale
    class Gatto extends Animale {
        //override del metodo verso
        public function verso() {
            return "Miagola";
        }
    }

//---------UTILIZZO QUINDI CON OGGETTI-----------

    //creazione di un oggetto Cane
    $cane = new Cane(nome: "Fido", specie: "Carlino", peso: 20, habitat: "Giardino");


    // Creazione di un oggetto Gatto
    $gatto = new Gatto(nome: "Felix", specie: "Main coon", peso: 5, habitat: "Divano");

    function faiParlare(Animale $animale) {
        echo "{$animale->nome} ({$animale->specie}) dice: " . $animale->verso() . "<br>";
        echo "Peso: {$animale->peso} kg e l Habitat è : {$animale->habitat}<br><br>";
    }

    faiParlare(animale: $gatto); //gatto
    faiParlare(animale: $cane); //cane
    
?>