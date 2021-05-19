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
    $id_vendita = $_GET["id_vendita"];
    //$da_eliminare = mysqli_real_escape_string($conn, $_GET["da_eliminare"]);
    $query="DELETE from carrello where id_vendita='".$id_vendita."' and ordinato_da = '".$_SESSION['username']."'";
    mysqli_query($conn, $query);
    mysqli_close($conn); 

?>