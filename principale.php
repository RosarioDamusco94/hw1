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

?>

<html>
<head>
 <meta charset="utf-8">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=PT+Serif:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="principale.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>

    <div id="nome"><?php echo $_SESSION["username"];?>,<br>benvenuto <br> in hw1</div>

        <nav>
        <a href="principale.php">Home</a>
            <a href="shop.php">Shop</a>
            <a href="ricettario.php">Ricettario</a>
            <a href="pag_carrello.php">Carrello</a>
            <a href="logout.php">Esci</a>
        </div>
            
            <div id="menu">
                <div></div>
                <div></div>
                <div></div>
              </div>             
        </nav>
        
    </header>
    <section>   

<div id="Corpo">
    <div>
        <img src="prodotto.jpg" />
        <h1>Shop</h1>
        <a class="button" href="shop.php">Visita</a>
        <p><em>Tutto ciò che cerchi è qui</em></p>
    </div>

    <div>
        <img src="ricettario.jpg" />
        <h1>Ricettario</h1>
        <a class="button" href="ricettario.php">Visita</a>
        <p><em>Cucina con noi</em></p>
    </div>


    <div>
        <img src="cv.jfif" />
        <h1>Lavora con noi</h1>
        <a class="button" >Visita</a>
        <p><em>Entra a far parte del nostro team</em></p>
    </div>
</div>

</section>

<footer>
<h2>Damusco Rosario O46001882</h2>
</footer>
</body>
</html>