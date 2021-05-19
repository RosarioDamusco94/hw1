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
<link rel="stylesheet" href="ricettario_.css">
<script src="ricettario.js" defer></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>

    <div id="nome"> Cucina con noi</div>

        <nav>
            <div id="barra">
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

    <article>
    
      <section>
      <form name="form" id="form" method="post">
              <p><label><input type='text' name='ricerca' id="ricerca" placeholder="Ricerca..."></label></p>
            <p><label>&nbsp;<input type='submit'></label></p>
          </form>
          <div class="negozio"></div>
        </section> 

      

    </article>


<footer>
<h2>Damusco Rosario O46001882</h2>
</footer>
</body>
</html>