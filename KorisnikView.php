<?php

class KorisnikView
{
    
    // medoda za prikaz registracijske forme
    public function prikaziFormu()
    {
        echo'
        <hr>
        <h2>Registracija</h2>
            <form method="post" action="KorisnikController.php">
                <input type="text" name ="ime" placeholder="Ime" required><br><br>
                <input type="text" name ="prezime" placeholder="Prezime" required><br><br>
                <input type="email" name ="email" placeholder="E-mail" required><br><br>
                <input type="password" name ="lozinka" placeholder="Lozinka" required><br><br>
                <input type="password" name ="lozinkap" placeholder="Ponovljena lozinka" required><br><br>

                <input type="submit" name="registracija" value="Registriraj se">
            </form>
        ';
    }

    // metoda za prikaz login-logout forme




    // ispis svih korisnika iz baze, radi kontrole funkcionalnosti
    public function prikaziKorisnike($svi_korisnici)
    {
        echo "<h2>Popis svih korisnika</h2>";
        echo "<table>
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>E-mail</th>
            <th>Lozinka hashirana</th>
            <th>TOKEN</th>
            <th>status</th>
        </tr>";

        foreach($svi_korisnici as $korisnik)
        {
            echo "
            <tr>
                <td>{$korisnik['id']}</td>
                <td>{$korisnik['ime']}</td>
                <td>{$korisnik['prezime']}</td>
                <td>{$korisnik['email']}</td>
                <td>{$korisnik['lozinka']}</td>
                <td>{$korisnik['token']}</td>
                <td>{$korisnik['status']}</td>
            </tr>";          
        }
        echo "</table>";
    }

}


?>