<?php

    // Avvia la sessione
    session_start();
    // Verifica se l'utente è loggato
    if(!isset($_SESSION['username']))
    {
        // Vai alla login
        header("Location: login.php");
        exit;
    }

    $conn=mysqli_connect("localhost", "root", "", "progetto");
    $acquisto=$_GET["id"];
    $username=$_SESSION['username'];
    $query1= "INSERT into carrello (id_prodotto, immagine, nome_prodotto, ordinato_da, prezzo) select id_prodotto, immagine, nome_prodotto, username, prezzo from prodotti p, clienti c where c.username='".$username."' and p.id_prodotto='".$acquisto."'";
    
    mysqli_query($conn, $query1);
    
    mysqli_close($conn);

?>