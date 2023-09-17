<?php
class Technician
{
    public function __construct(
        private int $techID,
        private string $fname,
        private string $lname,
        private string $email,
        private string $phone,
        private string $password
    ) {
    }

    public function getID()
    {
        return $this->techID;
    }

    public function setID(int $value)
    {
        $this->techID = $value;
    }

    public function getFname()
    {
        return $this->fname;
    }

    public function setFname(string $value)
    {
        $this->fname = $value;
    }

    public function getLname()
    {
        return $this->lname;
    }

    public function setLname(string $value)
    {
        $this->lname = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail(string $value)
    {
        $this->email = $value;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone(string $value)
    {
        $this->phone = $value;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $value)
    {
        $this->password = $value;
    }
}
