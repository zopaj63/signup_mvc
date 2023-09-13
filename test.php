<?php

include_once "./Database.php";
include_once "./KorisnikModel.php";

$config=new Config("config.ini");
$db=Database::getInstance($config);
$conn=$db->getConnection();

$korisnikModel=new KorisnikModel($db);

$testEmail="pk@pk.pk";

if ($korisnikModel->emailPostoji($testEmail))
{
    echo "Mail postoji\n";
}
else
{
    echo "Mail ne postoji\n";
}


?>