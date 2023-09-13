<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidencija</title>
    <link href="./style.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
    <h1>Registracijska forma, MVC</h1>
    <p><a href="https://github.com/zopaj63/signup_mvc" target="_blank">GitHub</a></p><br>


<?php

    //privremeni debuging
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    //require "autoload.php";
    include_once "Database.php";
    include_once "KorisnikModel.php";
    include_once "KorisnikView.php";
    include_once "KorisnikController.php";


    // todo: signup - login - logout izbor

    $config=new Config("config.ini");
    $db=Database::getInstance($config);
    $conn=$db->getConnection();

    if ($conn)
    {
        echo "Uspješno spajanje na bazu!";
    }
    else
    {
        echo "Greška pri spajanju na bazu!";
    }



    $view=new KorisnikView();
    $view->prikaziFormu();

    $model=new KorisnikModel();

    $controller=new KorisnikController($model, $view);
    $controller->dohvatiRegistraciju();
    //ne radi:
    //$controller->registrirajNovogKorisnika($ime, $prezime, $email, $lozinka_hash, $token);
    

    // samo za kontrolu funkcionalnosti
    $controller->prikaziSveKorisnike();
    $message_good="Uspješan prikaz svih korisnika";

?>

    <!-- ispis poruka -->
    <?php if ($message_good) ?>
    <h3 style="color: green";><?php echo $message_good; ?></h3>
    <php endif; ?>
    
    <?php if ($message_bad) ?>
    <h3  style="color: red";><?php echo $message_bad; ?></h3>
    <php endif; ?>  


    </div>
    
    </body>
    </html>