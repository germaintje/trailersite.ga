<?php include 'view/inc/header.php' ?>

<div id="home-movie-list" class="container">
    <div class="row">
        <div class="col-12">
            <h1><?= $_GET['genreName']; ?></h1>
        </div>
        <div class="col-12">
            <div class="row">
                <?= $result; ?>
            </div>
        </div>
    </div>
</div>


<?php include 'view/inc/footer.php' ?>
