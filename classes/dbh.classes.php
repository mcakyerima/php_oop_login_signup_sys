<?php


// database connection class
class Dbh
{

    protected function connect()
    {
        try {
            //db credentials
            $username = "mcakyerima";
            $password = "Mcakyerima1";
            $dbh = new PDO('mysql:host=localhost; dbname=ooplogin', $username, $password);
            return $dbh;
        } catch (PDOException  $e) {
            //throw error;
            print "Error: " . $e->getMessage() . "\n";
            header("location: ../index.php?error=connectionError");
            die();
        }
    }
}
