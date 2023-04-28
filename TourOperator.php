<?php
include('./partial/navbar.html');
require_once('./class/destinationManager.php');
require_once('./class/TourOperatormanager.php');
require_once('./class/destination.php');
require_once('./class/tourOperator.php');
require_once('./config/db.php');

$manager = new TourOperatorManager($db);
$destinationManager = new DestinationManager($db);
?>

<!--Dispaly destination by id -->

<div class="TourOperator">
    <?php $allDestination = $destinationManager->getDestinationByName($_GET['location']); ?>
    <div class="title">
        <h1><?= $_GET['location'] ?></h1>
        <h2>A partir de <?= $allDestination[0]->getPrice() ?> Euros</h2>
        <h4>Liste des Operateurs proposant ce voyage</h4>
        <?php foreach ($allDestination as $destination) :
            $operator = $manager->getOperatorByDestination($destination->getIdTourOperator()); ?>
            <form action="detail_operator.php" method="post">
                <input type="hidden" name="to" value="<?= $operator->getId() ?>">
                <button type="submit" class="btn btn-primary"><?= $operator->getName() ?></button>
            </form>
        <?php endforeach; ?>
    </div>
</div>

<?php
include('./partial/footer.html')
?>