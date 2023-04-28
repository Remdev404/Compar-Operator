<?php
include('./partial/navbar.html');
require_once('./config/db.php');
require_once('./class/destination.php');
require_once('./class/TourOperatormanager.php');
require_once('./class/destinationManager.php');
require_once('./class/review.php');
require_once('./class/ReviewManager.php');
require_once('./class/tourOperator.php');

$tourOperatorManager = new TourOperatorManager($db);
$destinationManager = new DestinationManager($db);
$reviewManager = new ReviewManager($db);


$operator = $tourOperatorManager->getOperatorByDestination($_POST['to']);
$allDestination = $destinationManager->getDestinationByIdTo($operator->getId());
$allReviews = $reviewManager->getReviewByIdTo($operator->getId());

?>

<!--Display info To -->

<div class="detail_operator">
    <div class="content">
        <div class="row">
            <div class="col-12 col-md-6 m-0">
                <div class="operator_description">
                    <div class="operator_title">
                        <h1><?= $operator->getName() ?></h1>
                    </div>

                    <?php if ($operator->getIsPremium() == 1) { ?>
                        <a class='link text-white' href="<?= $operator->getLink() ?>"><?= $operator->getLink() ?></a>
                    <?php } ?>
                </div>
            </div>
            <!--Display messsage -->
            <div class="col-12 col-md-6 m-0 affichage_review">
                <div class="reviews-container">
                    <?php
                    foreach ($allReviews as $review) :
                    ?>
                        <div class="review">
                            <h3><?= $review->getAuthor() ?></h3>
                            <p><?= $review->getMessage() ?> </p>
                        </div>
                    <?php endforeach; ?>
                    <!--Form comments -->
                    <div class="form_review">
                        <form class="form" action="./process/process_Create_Review.php" method="post">
                            <div class="mb-3">
                                <label for="pseudo" class="form-label"></label>
                                <input type='hidden' name='id_tour_operator' value="<?= $operator->getId() ?>">
                                <input type="text" class="form-control" id="author" placeholder="Pseudo" name="author">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Ecrire un commentaire</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include('./partial/footer.html')
?>