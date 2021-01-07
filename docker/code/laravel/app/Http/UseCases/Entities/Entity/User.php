<?php

namespace App\Http\UseCases\Entity;

class User {
    private $userId;
    private $userName;
    private $userEmail;
    private $userPass;
    private $error;

    public function __construct() {
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getUserEmail() {
        return $this->userEmail;
    }

    public function getUserPass() {
        return $this->userPass;
    }

    public function getError() {
        return $this->error;
    }

    public function setUserId(int $id) {
        $this->userId = $id;
    }

    public function setUserName($name) {
        $this->userName = $name;
    }

    public function setUserEmail($email) {
        $this->userEmail = $email;
    }

    public function setUserPass($pass) {
        $this->userPass = $pass;
    }

    public function setError($error) {
        $this->error = $error;
    }
}
