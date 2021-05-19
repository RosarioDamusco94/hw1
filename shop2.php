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
    $prodotti=array();
    $query="SELECT * from prodotti";
    $ris=mysqli_query($conn, $query);
    while($row=mysqli_fetch_assoc($ris)){
        $prodotti[]=$row; //legge il prodotto e lo mette alla fine della lista
    }
    mysqli_free_result($ris);
        mysqli_close($conn);
        echo json_encode($prodotti);   

?>