<?php
    if(!isset($_GET['id']) || empty($_GET['id']))
    {
        die("Fali ID proizvoda!");
    }

    require_once "models/base.php";

    $car_id = $_GET['id'];
    $result = $base->query("SELECT * FROM used_cars WHERE id = $car_id");
    
    if($result -> num_rows == 0)
    {
        die("Ovaj proizvod ne postoji");
    }

    $car = $result -> fetch_assoc();

?>

<!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= $car['ime'] ?></title>
    </head>

    <body>
        <h1> <?= $car['ime'] ?> </h1>
        <p> <?= $car['opis'] ?> </p>
        <br>
        <p> <?= $car['cena'] ?> RSD </p>

        <?php if($car['kolicina'] == 0): ?>
            <p>Ima na stanju</p>
        <?php else: ?>
            <p>Nema na stanju</p>
        <?php endif; ?>

    </body>

</html>