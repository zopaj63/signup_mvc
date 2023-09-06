<?php

class KorisnikView
{
    
    public function prikaziFormu()
    {
        echo'
        <hr>
        <h2>Registracijska forma</h2>
            <hr>
            <p>Ispunite sve podatke:</p>
            <form method="post" action="">
                <input type="text" name ="ime" placeholder="Ime" required><br><br>
                <input type="text" name ="prezime" placeholder="Prezime" required><br><br>
                <input type="email" name ="email" placeholder="E-mail" required><br><br>
                <input type="password" name ="lozinka" placeholder="Lozinka" required><br><br>
                <input type="password" name ="lozinkap" placeholder="Ponovljena lozinka" required><br><br>

                <input type="submit" name="registracija" value="Registriraj se">
            </form>
            <hr>
        ';
    }

    // radi kontrole funkcionalnosti
    public function prikaziKorisnike($svi_korisnici)
    {
        echo "<h3>Popis svih korisnika</h3>";

        foreach($svi_korisnici as $korisnik)
        {
            echo "<p>ID: {$korisnik['id']}</p>";
            echo "<p>Ime: {$korisnik['ime']}</p>";
            echo "<p>Prezime: {$korisnik['prezime']}</p>";
            echo "<p>E-mail: {$korisnik['email']}</p>";
            echo "<p>TOKEN: {$korisnik['token']}</p>";
            echo "<hr>";
        }
    }
}


?>