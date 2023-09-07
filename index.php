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
    $controller->registrirajNovogKorisnika($ime, $prezime, $email, $lozinka_hash, $token);




?>

    <!-- ispis poruka -->
    <?php if ($message_good) ?>
    <h4 style="color: darkgreen";><?php echo $message_good; ?></h4>
    <php endif; ?>
    
    <?php if ($message_bad) ?>
    <h4  style="color: red";><?php echo $message_bad; ?></h4>
    <php endif; ?>   

<?php
    // samo za kontrolu funkcionalnosti
    $controller->prikaziSveKorisnike();

?>