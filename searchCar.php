<?php
    if(!isset($_GET['ime']) || empty($_GET['ime']))
    {
        die("Niste uneli naziv automobila!");
    }

    $ime = $_GET['ime'];

    require_once "base.php";
    
    $result = $base -> query("SELECT * FROM used_cars WHERE ime LIKE '%$ime%' OR opis LIKE '%$ime%'");
    
    if($result -> num_rows >= 1)
    {
        echo "Automobil je pronadjen!";
    }
    else
    {
        echo "Nazalost, automobil nije pronadjen! :/";
    }
