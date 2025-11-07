// =======================================================
//  ESERCIZIO : Sistema di pagamento
// Obiettivo: usare classi, ereditarietà e metodi personalizzati
// =======================================================



<?php

class Pagamento {
    protected $importo;

    public function __construct($importo) {
        $this->importo = $importo;
    }

    public function esegui() {
        return "Pagamento generico di {$this->importo} euro.";
    }
}

class CartaDiCredito extends Pagamento {
    private $numeroCarta;

    public function __construct($importo, $numeroCarta) {
        parent::__construct($importo);
        $this->numeroCarta = $numeroCarta;
    }

    public function esegui() {
        $ultimeCifre = substr($this->numeroCarta, -4);
        return "Pagamento di {$this->importo} euro con carta terminante in {$ultimeCifre}.";
    }
}

class PayPal extends Pagamento {
    private $email;

    public function __construct($importo, $email) {
        parent::__construct($importo);
        $this->email = $email;
    }

    public function esegui() {
        return "Pagamento di {$this->importo} euro tramite PayPal ({$this->email}).";
    }
}

class Contanti extends Pagamento {
    public function esegui() {
        return "Pagamento di {$this->importo} euro in contanti.";
    }
}

function processaPagamento(Pagamento $p) {
    echo $p->esegui() . "Pagamento completato.<br>";
}

// Test
$pagamenti = [
    new CartaDiCredito(120.50, "1234567890123456"),
    new PayPal(59.99, "cliente@email.com"),
    new Contanti(20)
];

foreach ($pagamenti as $p) {
    processaPagamento($p);
}
?>
