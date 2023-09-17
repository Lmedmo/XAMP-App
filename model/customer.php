<?php
class Customer
{
    public function __construct(
        private int $customerID,
        private string $firstName,
        private string $lastName,
        private string $address,
        private string $city,
        private string $state,
        private int $postalCode,
        private string $countryCode,
        private string $phone,
        private string $email,
        private string $password
    ) {
    }
    public function getID()
    {
        return $this->customerID;
    }
    public function setID($value)
    {
        $this->customerID = $value;
    }

    public function getFname()
    {
        return $this->firstName;
    }
    public function setFname($value)
    {
        $this->firstName = $value;
    }

    public function getLname()
    {
        return $this->lastName;
    }
    public function setLname($value)
    {
        $this->lastName = $value;
    }

    public function getAddress()
    {
        return $this->address;
    }
    public function setAddress($value)
    {
        $this->address = $value;
    }

    public function getCity()
    {
        return $this->city;
    }
    public function setCity($value)
    {
        $this->city = $value;
    }

    public function getState()
    {
        return $this->state;
    }
    public function setState($value)
    {
        $this->state = $value;
    }

    public function getPostal()
    {
        return $this->postalCode;
    }
    public function setPostal($value)
    {
        $this->postalCode = $value;
    }

    public function getCountry()
    {
        return $this->countryCode;
    }
    public function setCountry($value)
    {
        $this->countryCode = $value;
    }

    public function getPhone()
    {
        return $this->phone;
    }
    public function setPhone($value)
    {
        $this->phone = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($value)
    {
        $this->email = $value;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($value)
    {
        $this->password = $value;
    }
}
