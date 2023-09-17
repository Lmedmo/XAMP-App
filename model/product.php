<?php
class Product
{
    public function __construct(
        private string $code,
        private string $name,
        private float $version,
        private string $releaseDate,
    ) {
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode(string $value)
    {
        $this->code = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName(string $value)
    {
        $this->name = $value;
    }

    public function getVersion()
    {
        return $this->version;
    }

    public function setVersion(float $value)
    {
        $this->version = $value;
    }

    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(string $value)
    {
        $this->releaseDate = $value;
    }
}
