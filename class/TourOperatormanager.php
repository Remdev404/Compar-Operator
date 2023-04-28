<?php

class TourOperatorManager
{
    private $db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
    }

    public function getOperatorByDestination($id)
    {

        $q = $this->db->prepare('SELECT * FROM tour_operator WHERE id = ?');
        $q->execute([$id]);
        $operator = $q->fetch(PDO::FETCH_ASSOC);

        return new TourOperator($operator);
    }

    public function getAllOperator()
    {
        $allOperator = [];
        $q = $this->db->prepare('SELECT * FROM tour_operator');
        $q->execute();
        $datas = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($datas as $data) {
            $operator = new TourOperator($data);
            array_push($allOperator, $operator);
        }
        return $allOperator;
    }
}
