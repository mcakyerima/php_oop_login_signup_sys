<?php

class SignupContrl extends Signup
{

    private $uid;
    private $email;
    private $pwd;
    private $pwdRepeat;

    // creating a cunstructor object for user input
    public function __construct($uid, $email, $pwd, $pwdRepeat)
    {
        $this->uid = $uid;
        $this->email = $email;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
    }

    // input validation methods
    private function emptyInput()
    {
        $result;
        if (empty($this->uid) || empty($this->pwd) || empty($this->email) || empty($this->pwdRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // valid username check
    private function invalidUid()
    {
        $result;
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = false;
        } else {
            $result = true;
        }

        return $result;
    }

    // validate email 
    private function invalidEmail()
    {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // validate password match
    private function pwdMatch()
    {
        $result;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function uidTakenCheck()
    {
        $result;
        // pass uid and email from user inside the controller class
        if (!$this->checkUser($this->uid, $this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    // if all error handlers return false the sign up the user
    public function signupUser()
    {
        if ($this->emptyInput() == false) {
            // echo "Empty input";
            header('location: ../index.php?error=emptyinput');
            exit();
        }
        if ($this->invalidUid() == false) {
            // echo "username is invalid";
            header('location: ../index.php?error=username');
            exit();
        }
        if ($this->invalidEmail() == false) {
            // echo "Email not valid";
            header('location: ../index.php?error=email');
            exit();
        }
        if ($this->pwdMatch() == false) {
            // echo "password dont match"
            header("location: ../index.php?error=passwordmatch");
            exit();
        }
        if ($this->uidTakenCheck() == false) {
            // echo "email or username already taken"
            header('location: ../index.php?error=usernameoremailtaken');
            exit();
        }

        //add user to database
        $this->setUser($this->uid, $this->pwd, $this->email);
    }
}
