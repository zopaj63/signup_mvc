<?php

include_once "Config.php";
include_once "Database.php";

global $message_good;
global $message_bad;

class KorisnikModel
{
    private $conn;
    private $table="korisnici";

    public function __construct()
    {
        $config=new Config('./config.ini');
        $database=Database::getInstance($config);
        $this->conn=$database->getConnection();
    }

    public function dodajKorisnika()
    {
        $ime=htmlspecialchars($ime);
        $prezime=htmlspecialchars($prezime);
        $email=htmlspecialchars($email);
        $token=bin2hex(random_bytes(16));
        $lozinka_hash=password_hash($lozinka, PASSWORD_DEFAULT);

        $stmt=$this->conn->prepare("INSERT INTO ".$this->table."(ime, prezime, email, lozinka, token) VALUES (:ime, :prezime, :email, :lozinka, :token)");
        $stmt->bindParam(":ime", $ime);
        $stmt->bindParam(":prezime", $prezime);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":lozinka", $lozinka_hash);
        $stmt->bindParam(":token", $token);

        if($stmt->execute())
        {
            $message_good= "Uspješna registracija";
        }
        else
        {
            $message_bad= "Došlo je do greške";
        }

    }

    // radi kontrole funkcionalnosti
    public function dohvatiSveKorisnike()
    {
        $stmt=$this->conn->prepare("SELECT * FROM ".$this->table);
        $stmt->execute();
        return $stmt;

    }

    public function emailPostoji($email)
        {
            $query="SELECT email FROM ".$this->table." WHERE email=?";
            $stmt=$this->conn->prepare($query);
            $stmt->bindParam(1, $email);
            $stmt->execute();

            if ($stmt->rowCount()>0)
            {
                return true; //mail već postoji u bazi
            }
            else
            {
                return false; //mail ne postoji u bazi
            }
        }




}


?>