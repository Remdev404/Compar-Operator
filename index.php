<?php
include('./partial/navbar.html');
require_once('./class/destinationManager.php');
require_once('./class/destination.php');
require_once('./config/db.php');
?>

<body>

    <!--Display all destination -->

    <section id="main">

        <?php
        $manager = new DestinationManager($db);
        $allDestinations = $manager->getAllDestination();
        ?>


        <div class="Cards mb-4 row" id="listDestinations">
            <div class="col-12 mb-4">
                <div class="divObscur">
                    <div class="listDestinations">
                        <h2>Listes des Destinations:</h2>
                    </div>
                </div>
            </div>

            <?php foreach ($allDestinations as $destination) : ?>
                <div class="col-md-3 col-sm-6">
                    <div class="card mb-4">
                        <img src="<?= $destination->getImages() ?>" class="card-img-top" alt="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $destination->getLocation() ?></h5>
                            <p class="card-text">A partir de <?= $destination->getPrice() ?> Euros</p>
                            <a href="TourOperator.php?location=<?= $destination->getLocation() ?>" class="btn btn-primary">En savoir plus</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>


    </section>


    <?php
    include('./partial/footer.html')
    ?>
</body>

</html>