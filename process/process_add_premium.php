<?php
require_once '../class/tourOperator.php';
require_once '../class/adminManager.php';
require_once '../config/db.php';

$manager = new AdminManager($db);
if (isset($_POST['id_tour_operator'])) {
    $id_tour_operator = $_POST['id_tour_operator'];
}

$manager->getUpdateOperatorToPremium($id_tour_operator);

header('location: ../admin.php');
