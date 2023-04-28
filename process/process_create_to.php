<?php
require_once '../class/destination.php';
require_once '../class/adminManager.php';
require_once '../config/db.php';

$manager = new AdminManager($db);
if (isset($_POST['name']) && isset($_POST['link'])) {
    $data = [
        'name' => $_POST['name'],
        'link' => $_POST['link']
    ];
}

$manager->createTourOperator($data);

header('location: ../admin.php');
