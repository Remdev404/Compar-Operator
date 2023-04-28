<?php

class DestinationManager
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


    public function getAllDestination()
    {
        $allDestination = [];
        $q = $this->db->prepare('SELECT * FROM destination');
        $q->execute();
        $datas = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($datas as $data) {
            $destination = new Destination($data);
            array_push($allDestination, $destination);
        }
        return $allDestination;
    }


    public function getDestinationByName(string $name)
    {
        $allDestination = [];

        $q = $this->db->prepare(
            'SELECT *
        FROM destination 
        WHERE location = ?'
        );
        $q->execute([$name]);
        $datas = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($datas as $data) {
            $data = new Destination($data);
            array_push($allDestination, $data);
        }

        return $allDestination;
    }

    public function getDestinationByIdTo($id)
    {
        $allDestination = [];

        $q = $this->db->prepare(
            'SELECT * FROM destination
        WHERE id_tour_operator = ?'
        );
        $q->execute([$id]);
        $datas = $q->fetchAll(PDO::FETCH_ASSOC);

        foreach ($datas as $data) {
            $allDestination[] = new Destination($data);
        }

        return $allDestination;
    }
}
