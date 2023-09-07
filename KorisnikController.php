<?php

include_once "./KorisnikModel.php";
include_once "./KorisnikView.php";

global $message_good;
global $message_bad;
class KorisnikController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model=$model;
        $this->view=$view;
    }

    // dohvat podataka s forme za registraciju
    public function dohvatiRegistraciju()
    {
        if (isset($_POST['registracija']))
        {
            $ime=$_POST['ime'];
            $prezime=$_POST['prezime'];
            $email=$_POST['email'];
            $lozinka=$_POST['lozinka'];
            $lozinkap=$_POST['lozinkap'];

            if($lozinka===$lozinkap)
            {
                return true;

            }
            else
            {
                $message_bad= "Lozinka i ponovljena lozinka se ne podudaraju";
                return false;
            }

        }
        else
        {
            $message_bad="Popunite sva polja";
        }
    }

    // prikaz svih korisnika iz baze
    public function prikaziSveKorisnike()
    {
        $svi_korisnici=$this->model->dohvatiSveKorisnike()->fetchAll(PDO::FETCH_ASSOC);
        $this->view->prikaziKorisnike($svi_korisnici);
    }

    // obrada forme i provedba regisracije
    public function registrirajNovogKorisnika($ime, $prezime, $email, $lozinka_hash, $token)
    {
        if (!$user)
        {            
            $this->model->ime=$ime;
            $this->model->prezime=$prezime;
            $this->model->email=$email;
            $this->model->lozinka_hash=$lozinka_hash;
            $this->model->token=$token;

            $this->model->dodajKorisnika();

            $message_good="Uspješna registracija!";
        }
        else
        {
            $message_bad="Korisnik s tim e-mailom već postoji!";
        }
    }


}



?>