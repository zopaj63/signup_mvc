<?php

include_once "Config.php";
include_once "Database.php";

global $message_good;
global $message_bad;

class KorisnikModel
{
    private $conn;
    private $table="korisnici";

    public $ime;
    public $prezime;
    public $email;
    public $lozinka;
    public $lozinka_hash;
    public $token;

    public function __construct()
    {
        $config=new Config('./config.ini');
        $database=Database::getInstance($config);
        $this->conn=$database->getConnection();
    }

    // query za upis novog korisnika u bazu
    public function dodajKorisnika()
    {
        $stmt=$this->conn->prepare("INSERT INTO ".$this->table."(ime, prezime, email, lozinka, token) VALUES (:ime, :prezime, :email, :lozinka, :token)");

        $this->ime=htmlspecialchars(strip_tags($this->ime));
        $this->prezime=htmlspecialchars(strip_tags($this->prezime));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $token=bin2hex(random_bytes(16));
        $lozinka_hash=password_hash($this->lozinka, PASSWORD_DEFAULT);

        $stmt->bindParam(":ime", $ime);
        $stmt->bindParam(":prezime", $prezime);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":lozinka", $lozinka_hash);
        $stmt->bindParam(":token", $token);

        if($stmt->execute())
        {
            return true;
        }
        return false; //bez else, vraća false i istodobno se prekida program

    }

    // dohvat svih korisnika iz baze
    public function dohvatiSveKorisnike()
    {
        $stmt=$this->conn->prepare("SELECT * FROM ".$this->table);
        $stmt->execute();
        return $stmt;

    }

    // provjera postoji li upisani mail (korisnik) već u bazi
    public function emailPostoji($email)
    {
        $query="SELECT email FROM ".$this->table." WHERE email=:email";
        $stmt=$this->conn->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $user=$stmt->fetch();
        return $user;
    }




}


?>