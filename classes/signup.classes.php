<?php

class Signup extends Dbh
{

    //    methods for querying into the database;

    protected function checkUser($uid, $email)
    {
        // instantiate PDO connection and execute the query
        $stmt = $this->connect()->prepare('SELECT users_uid FROM users WHERE users_uid = ? OR users_email = ?;');
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            // if statement failed, send a header with error message;
            header('location: ../index.php?error=connctnfailed');
            exit();
        }

        // check for rows from query result
        $resultCheck;

        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }


    protected function setUser($uid, $pwd, $email)
    {
        // instantiate PDO connection and execute the query
        $stmt = $this->connect()->prepare('INSERT INTO users (users_uid, users_pwd, users_email) VALUES (? , ? , ? );');

        // hash password before inserting to database
        $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);

        if (!$stmt->execute(array($uid, $email, $hashpwd))) {
            $stmt = null;
            // if statement failed, send a header with error message;
            header('location: ../index.php?error=setuserfailed');
            exit();
        }
        $stmt = null;
    }
}
