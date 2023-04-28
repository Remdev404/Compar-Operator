<?php
include('./partial/navbar.html');
require_once("./class/tourOperator.php");
require_once("./class/adminManager.php");
require_once("./config/db.php");

$manager = new AdminManager($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="/css/styles.css" rel="stylesheet">
</head>






<body>
    <section id="main">
        <div class="container mt-5 d-flex justify-text-center">
            <h1>All Operators :</h1>
        </div>




        <div class="mt-5">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php $allTourOperator = $manager->getAllOperator();
                foreach ($allTourOperator as $operator) : ?>
                    <div class="col">
                        <div class="card bg-transparent">
                            <div class="card-body">
                                <h5 class="card-title"><?= $operator->getName() ?></h5>
                                <form method="post" action="./process/process_add_premium.php">
                                    <input type="hidden" name="id_tour_operator" value="<?= $operator->getId() ?>">
                                    <button type="submit" class="btn btn-primary">Add Premium</button>
                                </form>

                                <form method="post" action="./process/process_remove_premium.php">
                                    <input type="hidden" name="id_tour_operator" value="<?= $operator->getId() ?>">
                                    <button type="submit" class="btn btn-primary my-3">Remove Premium</button>
                                </form>

                                <div>
                                    <h1>Ajout d'une destination</h1>
                                    <form action="./process/process_add_destination.php" method="post" enctype="multipart/form-data">
                                        <label for="destination">Entrez une nouvelle destination</label>
                                        <input name="location" type="text">
                                        <label for="destination">Entrez un prix</label>
                                        <input name="price" type="text">
                                        <input type="hidden" name="id_tour_operator" value="<?= $operator->getId() ?>">
                                        <label for="file">Sélectionner le fichier à envoyer</label>
                                        <input type="file" name="file" accept="images/*" placeholder="Photo" required>
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <div class="mb-5 mt-5">
            <h1>Ajout un TO</h1>
            <form action="./process/process_create_to.php" method="post">
                <label for="destination">Entrez un nom</label>
                <input name="name" type="text">

                <label for="link">ajoutez un lien</label>
                <input name="link" type="url">

                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>

    </section>


    <?php
    include('./partial/footer.html')
    ?>
</body>

</html>