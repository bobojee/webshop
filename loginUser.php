<?php
    if(!isset($_POST['email']) || empty($_POST['email']))
    {
        die("Niste uneli email!");
    }

    if(!isset($_POST['sifra']) || empty($_POST['sifra']))
    {
        die("Niste uneli sifru!");
    }

    $email = $_POST['email'];
    $sifra = $_POST['sifra'];

    require_once "base.php";

    $result = $base->query("SELECT * FROM users WHERE email = '$email'");

    if($result->num_rows == 1)
    {
        $user = $result->fetch_assoc();
        $verifiedPassword = password_verify($sifra, $user['sifra']);

        if($verifiedPassword == true)
        {
            echo "Dobrodosli nazad!";
        }
        else
        {
            echo "Sifra nije tacna!";
        }
    }
    else
    {
        echo "Korisnik ne postoji!";
    }
    
    

    