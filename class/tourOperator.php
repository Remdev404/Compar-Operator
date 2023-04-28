<?php

class TourOperator
{
    private $id;
    private $name;
    private $gradeCount;
    private $grade_total;
    private $link;
    private $is_premium = 0;


    public function __construct($arrayTo)
    {
        $this->hydrate($arrayTo);
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

    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    public function getGradeCount()
    {
        return $this->gradeCount;
    }

    public function setGradeCount($gradeCount)
    {
        $this->gradeCount = $gradeCount;
    }

    public function getGradeTotal()
    {
        return $this->grade_total;
    }

    public function setGradeTotal($grade_total)
    {
        $this->grade_total = $grade_total;
    }

    public function getLink()
    {
        return $this->link;
    }

    public function setLink($link)
    {
        $this->link = $link;
    }

    public function getIsPremium()
    {
        return $this->is_premium;
    }

    public function setIs_Premium($is_premium)
    {
        $this->is_premium = $is_premium;
    }
}
