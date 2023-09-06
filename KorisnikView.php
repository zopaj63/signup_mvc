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
        echo "<p>ID - Ime - Prezime - E-mail - TOKEN - status</p>";

        foreach($svi_korisnici as $korisnik)
        {
            echo "<table border=1>
            <tr>
                <td>{$korisnik['id']}</td>
                <td>{$korisnik['ime']}</td>
                <td>{$korisnik['prezime']}</td>
                <td>{$korisnik['email']}</td>
                <td>{$korisnik['token']}</td>
                <td>{$korisnik['status']}</td>
            </tr>
            </table>";
        }
    }
}


?>