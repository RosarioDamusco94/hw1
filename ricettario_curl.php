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
    $conn = mysqli_connect("localhost", "root", "", "progetto");
    if(isset($_POST["ricerca"])){
        
        $ricerca = $_POST["ricerca"];
        $api_key = '347b115b5a104879886af3e9c95cca56';
        $curl = curl_init(); 
        curl_setopt($curl, CURLOPT_URL, "https://api.spoonacular.com/food/ingredients/search?query=".$ricerca."&apiKey=".$api_key);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec($curl);
        curl_close($curl);
        echo $result;
    }


?>