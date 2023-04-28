<?php


class ReviewManager
{

  private $bdd;

  public function __construct($db)
  {
    $this->setDb($db);
  }

  public function setDb(PDO $db)
  {
    $this->bdd = $db;
  }

  //creation review 

  public function createReview(Review $review)
  {
    $insertReview = $this->bdd->prepare('INSERT INTO review(message, author, id_tour_operator) 
    VALUES(:message, :author, :id_tour_operator)');

    $insertReview->execute([
      ':message' => $review->getMessage(),
      ':author' => $review->getAuthor(),
      ':id_tour_operator' => $review->getIdTourOperator()
    ]);
  }


  //delete Review

  public function deleteReview(Review $review)
  {

    $deleteReview = $this->bdd->prepare('DELETE FROM reviews WHERE id = :id');
    $deleteReview->bindValue(':id', $review->getId(), PDO::PARAM_INT);
    $deleteReview->execute();
  }

  //GET INFORMATIONS  

  // List review by operator // 

  public function getReviewByIdTo($id)
  {
    $allReviews = [];

    $q = $this->bdd->prepare(
      'SELECT * FROM review
        WHERE id_tour_operator = ?'
    );
    $q->execute([$id]);
    $donnees = $q->fetchAll(PDO::FETCH_ASSOC);

    foreach ($donnees as $donnee) {
      $allReviews[] = new Review($donnee);
    }

    return $allReviews;
  }
}
