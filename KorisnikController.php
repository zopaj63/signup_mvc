<?php

include_once "./KorisnikModel.php";
include_once "./KorisnikView.php";


class KorisnikController
{
    private $model;
    private $view;

    public function __construct($model, $view)
    {
        $this->model=$model;
        $this->view=$view;
    }


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

                if (!$user)
                {
                    dodajKorisnika();
                }
                else
                {
                    $message_bad= "Korisnik s tim mailom već postoji";
                }

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

    // radi kontrole funkcionalnosti
    public function prikaziSveKorisnike()
    {
        $svi_korisnici=$this->model->dohvatiSveKorisnike()->fetchAll(PDO::FETCH_ASSOC);
        $this->view->prikaziKorisnike($svi_korisnici);
    }





}



?>