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