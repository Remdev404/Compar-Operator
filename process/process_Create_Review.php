<?php
require_once('../class/review.php');
require_once('../class/tourOperator.php');
require_once('../class/ReviewManager.php');
require_once('../class/TourOperatormanager.php');
require_once('../config/db.php');

$reviewManager = new ReviewManager($db);
$operatorManager = new TourOperatorManager($db);

$id_tour_operator = intval($_POST['id_tour_operator']);

$TO = $operatorManager->getOperatorByDestination($_POST['id_tour_operator']);

if (isset($_POST['author']) && isset($_POST['message'])) {


    $review = new Review([
        'message' => $_POST['message'],
        'author' => $_POST['author'],
        'idTourOperator' => $TO->getId()
    ]);
}

$reviewManager->createReview($review);


header('Location: ../index.php');
