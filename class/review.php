<?php

class Review
{
    private $id;
    private $message;
    private $author;
    private $id_tour_operator;

    public function __construct(array $data)
    {
        $this->hydrate($data);
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

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setIdTourOperator($id_tour_operator)
    {
        $this->id_tour_operator = $id_tour_operator;
    }

    public function getIdTourOperator()
    {
        return $this->id_tour_operator;
    }
}
