<?php include 'view/inc/header.php'; ?>

    <div id="home-movie-list" class="container">
        <div class="row">
            <div class="col-12">
                <h1>Popular</h1>
            </div>
            <?= $result; ?>

            <?= $pagination; ?>

        </div>
    </div>
<?php include 'view/inc/footer.php'; ?>
