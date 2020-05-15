<?php include 'view/inc/header.php';
$movie_poster_path = $movieInfo['poster_path'];
?>

<div id="videoField">
    <?= "<iframe src='$videospider_url' width='800' height='500' allowfullscreen='true'></iframe>"; ?>
</div>

<div id="watch-movie-info" class="container">
    <div class="watch-movie-detail-section">
        <div class="watch-movie-image">
        <?php
            echo "<img src='http://image.tmdb.org/t/p/w185$movie_poster_path' alt=''/>"
        ?>
        </div>

        <div class="watch-movie-detail-info">
            <div class="watch-movie-title">
                <h1><?= $movieInfo['original_title'] ?></h1>
            </div>

            <div class="watch-movie-details">
                <table>
                    <tr>
                        <th>
                            rating:
                        </th>
                        <td>
                            <i class="fa fa-star" aria-hidden="true"></i>  <?= number_format($movieInfo['vote_average'], 1, '.', '') ?>
                            <span>(<?= $movieInfo['vote_count'] ?>)</span>
                        </td>
                    </tr>
                    <tr>
                        <th>release date:</th>
                        <td><?= date_create($movieInfo['release_date'])->format("d M Y"); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="watch-movie-overview">
        <h3>Overview</h3>
        <p><?= $movieInfo['overview'] ?></p>
    </div>
</div>


<?php include 'view/inc/footer.php'; ?>
