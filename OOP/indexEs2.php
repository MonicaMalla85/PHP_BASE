<?php
// =======================================================
//  ESERCIZIO : SCUOLA
// Obiettivo: usare classi, ereditarietà e metodi personalizzati
// =======================================================


//  Classe genitore: Persona
class Persona {
    // Proprietà comuni
    protected $nome;
    protected $cognome;

    // Costruttore
    public function __construct($nome, $cognome) {
        $this->nome = $nome;
        $this->cognome = $cognome;
    }

    // Metodo base (verrà riscritto nelle classi figlie)
    public function presentati() {
        return "Ciao, sono {$this->nome} {$this->cognome}.";
    }
}



//  Classe figlia: Studente
class Studente extends Persona {
    private $classe; // es. "3B"

    // Costruttore: richiama il costruttore del genitore
    public function __construct($nome, $cognome, $classe) {
        parent::__construct($nome, $cognome);
        $this->classe = $classe;
    }

    // Riscrive il metodo presentati()
    public function presentati() {
        return "Ciao, sono {$this->nome} {$this->cognome} e frequento la classe {$this->classe}.";
    }

    // Metodo aggiuntivo
    public function studia() {
        return "{$this->nome} sta studiando per l'interrogazione...";
    }
}



//  Classe figlia: Docente
class Docente extends Persona {
    private $materia; // es. "Matematica"

    // Costruttore
    public function __construct($nome, $cognome, $materia) {
        parent::__construct($nome, $cognome);
        $this->materia = $materia;
    }

    // Riscrive il metodo presentati()
    public function presentati() {
        return "Buongiorno, sono il prof. {$this->cognome} e insegno {$this->materia}.";
    }

    // Metodo aggiuntivo
    public function spiega() {
        return "Il prof. {$this->cognome} sta spiegando una lezione di {$this->materia}.";
    }
}



//  Programma principale

// Creiamo un oggetto Studente
$studente1 = new Studente("Luca", "Rossi", "3B");

// Creiamo un oggetto Docente
$docente1 = new Docente("Marco", "Bianchi", "Matematica");

// Facciamo “parlare” ciascuno
echo $studente1->presentati() . "<br>";
echo $studente1->studia() . "<br><br>";

echo $docente1->presentati() . "<br>";
echo $docente1->spiega() . "<br>";
?>

