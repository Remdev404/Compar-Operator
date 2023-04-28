<?php


class AdminManager
{

    private $db;


    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of db
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }


    // Functions

    public function getUpdateOperatorToPremium($id_tour_operator)
    {
        $query = $this->db->prepare('UPDATE tour_operator SET is_premium = 1 WHERE id = :id_tour_operator');
        $query->execute(
            [
                'id_tour_operator' => $id_tour_operator
            ]
        );
    }

    public function getUpdateOperatorToBasic($id_tour_operator)
    {
        $query = $this->db->prepare('UPDATE tour_operator SET is_premium = 0 WHERE id = :id_tour_operator');
        $query->execute(
            [
                'id_tour_operator' => $id_tour_operator
            ]
        );
    }

    public function getAllOperator()
    {
        $query = $this->db->prepare('SELECT * FROM tour_operator');
        $query->execute();
        $allOperator = $query->fetchAll(PDO::FETCH_ASSOC);

        $allTour_Operator = [];

        foreach ($allOperator as $data) {
            $operator = new TourOperator($data);
            array_push($allTour_Operator, $operator);
        }

        return $allTour_Operator;
    }



    public function createTourOperator(array $data)
    {
        $query = $this->db->prepare('INSERT INTO tour_operator  (name, link) VALUES (:name, :link)');
        $query->execute([
            'name' => $data['name'],
            'link' => $data['link']
        ]);
    }

    public function createDestination($location, $price, $photo, $id_tour_operator)
    {
        $photo_path = '/images/' . basename($photo['name']);
        $photo_tmp_path = $photo['tmp_name'];
        $id_tour_operator = intval($id_tour_operator);

        if (move_uploaded_file($photo_tmp_path, $_SERVER['DOCUMENT_ROOT'] . $photo_path)) {
            $stmt = $this->db->prepare('INSERT INTO destination (location, price, images, id_tour_operator) VALUES (:location, :price, :images, :id_tour_operator)');
            $stmt->execute([
                ':location' => $location,
                ':price' => $price,
                ':images' => $photo_path,
                ':id_tour_operator' => $id_tour_operator
            ]);
            return true;
        } else {
            return false;
        }
    }


    public function createReview(array $data)
    {
        $query = $this->db->prepare('INSERT INTO review (message, author, tour_operator_id) VALUES (:message, :author, :tour_operator_id)');
        $query->execute([
            'message' => $data['message'],
            'author' => $data['author'],
            'tour_id_operator' => $data['tour_id_operator']
        ]);
    }


    public function getAllDestination()
    {
        $query = $this->db->prepare('SELECT * FROM destination ');
        $allDestination = $query->fetchAll(PDO::FETCH_ASSOC);

        $allDestination = [];

        foreach ($allDestination as $data) {
            $destination = new Destination($data);
            array_push($allDestination, $destination);
        }

        return $allDestination;
    }
}
