<?php
class Registration
{
    private function __construct(
        private int $customerID,
        private string $productCode,
        private string $registrationDate
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
    public function getCode()
    {
        return $this->productCode;
    }
    public function setCode($value)
    {
        $this->productCode = $value;
    }
    public function getDate()
    {
        return $this->registrationDate;
    }
    public function setIDate($value)
    {
        $this->registrationDate = $value;
    }
}
