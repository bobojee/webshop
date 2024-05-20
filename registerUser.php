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
    $sifra = password_hash($_POST['sifra'], PASSWORD_BCRYPT);

    require_once "base.php";

    $result = $base -> query("SELECT * FROM users WHERE email = '$email'");

    if($result -> num_rows == 1)
    {
        die("Korisnik vec postoji!");
    }
    else
    {
        $base -> query("INSERT INTO users (email, sifra) VALUES ('$email', '$sifra')");
        echo "Uspjesno ste registrovani!";
    }

    
    