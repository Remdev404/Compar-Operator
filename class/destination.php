<?php

class Destination
{
    private $id;
    private $location;
    private $price;
    private $id_tour_operator;
    private $images;


    public function __construct($arrayDestination)
    {
        $this->hydrate($arrayDestination);
    }

    public function hydrate($data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);

            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getIdTourOperator()
    {
        return $this->id_tour_operator;
    }

    public function setId_tour_operator($id_tour_operator)
    {
        $this->id_tour_operator = $id_tour_operator;
    }

    public function getImages()
    {
        return $this->images;
    }

    public function setImages($images)
    {
        $this->images = $images;
    }
}
