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
    $username=$_SESSION['username'];
    $query="DELETE from riepilogo where utente='".$username."'";
    $query1="INSERT into riepilogo (SELECT ordinato_da, sum(prezzo) from carrello where ordinato_da='".$username."')";
    $query2= "SELECT id_vendita, immagine, nome_prodotto, ordinato_da, prezzo from carrello where ordinato_da='".$username."'";
    mysqli_query($conn, $query);
    mysqli_query($conn, $query1);
    $ris=mysqli_query($conn, $query2);
    while($row=mysqli_fetch_assoc($ris)){
        $prodotti[]=$row; //legge il prodotto e lo mette alla fine della lista
    }
    
    mysqli_free_result($ris);
        mysqli_close($conn);
        echo json_encode($prodotti);   
        

?>