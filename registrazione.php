<?php
    session_start();
    if(isset($_SESSION["username"])) {
        header("Location: principale.php");
        exit;
    }

    // Verifica l'esistenza di dati POST
    if(isset($_POST["nome"]) && isset($_POST['cognome']) && isset($_POST['codice_fiscale']) && 
       isset($_POST['username']) && isset($_POST['password'])){
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $codice_fiscale = $_POST["codice_fiscale"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        
        if(strlen("$password")<=6 ){
            $errore_password = true; 
        }
        
        if(isset($_POST["username"])){
            $conn = mysqli_connect("localhost", "root", "", "progetto");
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM clienti where username=\"$username\"";
            $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
            if (mysqli_num_rows($res) > 0)
                $errore_username = true;
            mysqli_free_result($res);
            mysqli_close($conn);
        }

        if(!isset($errore_username) && !isset($errore_password)){
        // Connetti al database
        $conn = mysqli_connect("localhost", "root", "", "progetto");
        if(!$conn){
            die('controllare ingresso db:' .mysql_error());
         }
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
        $codice_fiscale = mysqli_real_escape_string($conn, $_POST['codice_fiscale']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $pw = password_hash($password, PASSWORD_DEFAULT);
        
        // Cerca utenti con quelle credenziali
        $query = "INSERT INTO clienti VALUES (\"$nome\", \"$cognome\", \"$codice_fiscale\", \"$username\", \"$pw\")";
        $res = mysqli_query($conn, $query);
        mysqli_close($conn);
        $_SESSION["username"] = $username;
        header("Location: principale.php");
        exit;
        }
    }
?>

<html>
    <head>
        <script src='registrazione.js' defer></script>
        <link rel='stylesheet' href='registrazione1.css'>
        
    </head>
    <body>
        <header>
            <main id='tabella'>
                <form name='form' method='post'>
                    <p><label>Nome <input type='text' name='nome'></label></p>
                    <p><label>Cognome <input type='text' name='cognome'></label></p>
                    <p><label>Codice Fiscale <input type='text' name='codice_fiscale'></label></p>
                    <p><label>Username <input type='text' name='username'></label></p>
                    <p><label>Password <input type='password' name='password'></label></p>
                    <p><label>&nbsp;<input type='submit'></label></p>
                </form>
                <div id='warning' class='hidden'>Campi non corretti</div>
               
            </main>        
            <div id="errore">
                            <?php
                                   if (isset($errore_password)){
                                    echo "<span> Password debole 
                                    7 caratteri minimo </span><br>";
                                    }  
                                    
                                    if (isset($errore_username)) {
                                        echo "<span>Username esistente</span><br>";
                                    }
                            ?>
                        </div>

            <nav>
            <div id="links">
                <a href="1pagina.php">Indietro</a>             
                <a href="login.php">Accedi</a>
            </div>
        </nav>
        </header>
    </body>
</html>
