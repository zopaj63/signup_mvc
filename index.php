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

    
    // samo za kontrolu funkcionalnosti
    $controller=new KorisnikController($model, $view);
    $controller->prikaziSveKorisnike();








?>