<?php
require_once '../class/destination.php';
require_once '../class/adminManager.php';
require_once '../config/db.php';

var_dump($_POST);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $location = $_POST['location'];
    $price = $_POST['price'];
    $photo = $_FILES['file'];
    $id_tour_operator = $_POST['id_tour_operator'];

    $manager = new AdminManager($db);
    $manager->createDestination($location, $price, $photo, $id_tour_operator);
    header('Location: ../admin.php');
    exit;
}
