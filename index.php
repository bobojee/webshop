<?php
    //pola je na engleskom, pola na srpskom...
    
    require_once "models/base.php";

    $car_list = $base -> query("SELECT * FROM used_cars");
    $cars = $car_list -> fetch_all(MYSQLI_ASSOC);
    
?>


<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>second hand cars</title>
    </head>

    <body>

        <?php foreach($cars as $car): ?>
            <div>
                <h1><?= $car['ime'] ?></h1>
                <p><?= $car['opis'] ?></p>
                <p><?= $car['cena'] ?> RSD</p>
                <p>na stanju: <?= $car['kolicina'] ?></p>

                <?php if($car['kolicina'] == 0): ?>
                    <p>Ima na stanju</p>
                <?php else: ?>
                    <p>Nema na stanju</p>
                <?php endif; ?>

                <a href="product.php?id=<?= $car['id'] ?>">Pogledaj proizvod</a>
            </div>
        <?php endforeach; ?>

    </body>

</html>