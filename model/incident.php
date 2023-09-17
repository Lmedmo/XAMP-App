<?php
class Incident
{
    private int $techID;
    private string $dateClosed;
    private int $incidentID;

    public function __construct(
        private int $customerID,
        private string $productCode,
        private string $dateOpened,
        private string $title,
        private string $description
    ) {
    }

    public function getIncidentID()
    {
        return $this->incidentID;
    }
    public function setIncidentID($value)
    {
        $this->incidentID = $value;
    }
    public function getCustomerID()
    {
        return $this->customerID;
    }
    public function setCustomerID($value)
    {
        $this->customerID = $value;
    }
    public function getProductCode()
    {
        return $this->productCode;
    }
    public function setProductCode($value)
    {
        $this->productCode = $value;
    }
    public function getTechID()
    {
        return $this->techID;
    }
    public function setTechID($value)
    {
        $this->techID = $value;
    }
    public function getDateOpened()
    {
        return $this->dateOpened;
    }
    public function setDateOpened($value)
    {
        $this->dateOpened = $value;
    }
    public function getDateClosed()
    {
        return $this->dateClosed;
    }
    public function setDateClosed($value)
    {
        $this->dateClosed = $value;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($value)
    {
        $this->title = $value;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($value)
    {
        $this->description = $value;
    }
}
