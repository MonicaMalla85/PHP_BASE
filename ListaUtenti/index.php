<?php

    //impoerto il file functions perchè devo utilizzare le funzioni in questo file
    require_once 'functions.php';


    //-------LOGICA SALVATAGGIO SESSIONSTORAGE---


    //Inizializzo la rubrica con la sessione
    session_start();

    if (!isset($_SESSION['rubrica'])) {
        
        $_SESSION['rubrica'] = []; //prima volta: rubrica nella sessione del browser 
    }

    //Devo fare riferimento all array della sessione con &

    $rubrica = &$_SESSION['rubrica'];
    
    
    //----------------------------------------------


    //Gestione invio form per aggiungere contatto
    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add'])){

        $name = trim($_POST['name']); //prendo il nome dall input e lo salvo in una variabile
        $phone = trim($_POST['phone']); //preso anche il numero

        if ($name && $phone){

            addContact($rubrica, $name, $phone); //aggiungo il contatto alla rubrica
 
            $message = "Contatto aggiunto!";

        }else{
            
            $message = "Inserisci un nome o un numero di telefono...";
        }
    }

   
    //gestione di ricerca contatto

    $serchResult = null;

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])){

        $searchName = trim($_POST['search_name']); //prendo il nome da cercare

        $searchResult = searchContact($rubrica, $searchName);

    }


?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rubrica Contatti</title>
</head>
<body>


        <h1>Rubrica Contatti</h1>
        <!--Aggiunta del contatto-->
        <h2>Aggiungi Contatto</h2>

        <form action="" method="POST">

            Nome : <input type="text" name="name">
            Telefono : <input type="text" name="phone">

            <button type="submit" name="add">Aggiungi</button>

        </form>


        <!--Ricerca del contatto-->
        <h2>Ricerca Contatto</h2>
        
        <form action="" method="POST">

            Nome : <input type="text" name="search_name">

            <button type="submit" name="search">Cerca</button>

        </form>

         <?php
            //campo ricerca
            if($searchResult !== null){
                echo "Risultato : " . $searchResult->getInfo();
            
            }elseif (isset($_POST['search'])){
                echo "Contatto non trovato";
            }

        ?>


        <!---Per stampare tutti i contatti devo andare a prendere la rubrica stampata nella sessione  attraverso la funzione printContacts --->    
        <h2>Elenco Contatti</h2>

        <?php

            printContacts($rubrica);

        ?>


        <!--Sessione di debug-->
        <h2>Debug sessione</h2>

        <pre> <?php print_r($_SESSION) ?>  </pre>




</body>
</html>