<?php include 'view/inc/header.php';
$movie_poster_path = $movieInfo['poster_path'];

$test = $movieInfo['seasons'];
var_dump($test);
echo $movieInfo['seasons'];

$seasons = [];

//foreach ($movieInfo as $key => $value) {
//var_dump($key);
//        if ($key == "seasons") {
//            array_push($seasons, $value);
//        }
//}



$movieGenres = [];
foreach ($movieInfo['genres'] as $genreArray) {
    foreach ($genreArray as $key => $value) {
        if ($key == "name") {
            array_push($movieGenres, $value);
        }
    }
}
?>

<div id='videoField'>
    <?php
    if ($videospider_url == null) {
        echo "<img src='view/images/no-video-available.png' width='800' height='500' alt='Not videos found'><br>";
    } else {
        echo "<iframe src='$videospider_url' width='800' height='500' allowfullscreen='true'></iframe>";
    }
    ?>

</div>

<div id="watch-movie-info" class="container">
    <div class="row>">
        <div class="watch-movie-detail-section col-12">
            <div class="row">
                <div class="watch-movie-image col-12 col-md-4 col-lg-3 col-xl-2">
                    <?php
                    if ($movie_poster_path == null) {
                        echo "<img src='view/images/not_found_poster.jpg' alt=''/>";
                    } else {
                        echo "<img src='http://image.tmdb.org/t/p/w185$movie_poster_path' alt=''/>";
                    }
                    ?>
                </div>

                <div class="watch-movie-detail-info col-12 col-md-8 col-lg-9 col-xl-10">
                    <div class="watch-movie-title">
                        <?php
                        if ($_GET['request'] == "serieDetail") {
                            $title = "<h1>" . $movieInfo['original_name'] . "</h1>";
                        } else {
                            $title = "<h1>" . $movieInfo['title'] . "</h1>";
                        }
                        echo $title;
                        ?>
                    </div>

                    <div class="watch-movie-details">
                        <div class="col-12 col-md-8 col-lg-9 col-xl-5 details">
                            <h3>Details</h3>
                            <table>
                                <tr>
                                    <th>
                                        rating:
                                    </th>
                                    <td>
                                        <i class="fa fa-star"></i><?= $movieInfo['vote_average'] ?>
                                        <span>(
                            <?= $movieInfo['vote_count'] ?> votes)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>release date:</th>
                                    <td>
                                        <?php
                                        if ($_GET['request'] == "serieDetail") {
                                            $release_date = date_create($movieInfo['first_air_date'])->format("d M Y");
                                        } else {
                                            $release_date = date_create($movieInfo['release_date'])->format("d M Y");
                                        }
                                        echo $release_date;
                                        ?>
                                    </td>
                                </tr>
                                <?php
                                if ($_GET['request'] == "movieDetail") {
                                    $runtime = "";
                                    $runtime .= "<tr>";
                                    $runtime .= "<th>duration:</th>";
                                    $runtime .= "<td>";
                                    $runtime .= $movieInfo['runtime'];
                                    $runtime .= "</td>";
                                    $runtime .= "</tr>";
                                    echo $runtime;
                                }
                                ?>
                                <tr>
                                    <th>genres:</th>
                                    <td><?= implode(", ", $movieGenres); ?></td>
                                </tr>
                                <tr>
                                    <th>status:</th>
                                    <td><?= $movieInfo['status']; ?></td>
                                </tr>
                                <tr>
                                    <th>language:</th>
                                    <td> <?= $movieInfo['original_language']; ?></td>
                                </tr>
                            </table>
                            </p>
                        </div>
                        <div class="col-12 col-md-8 col-lg-9 col-xl-7 details">
                            <h3>Overview</h3>
                            <p><?= $movieInfo['overview'] ?></p>
                        </div>
                    </div>
                </div>

                <div class="watch-similar-movies col-12">
                    <h3>Seasons</h3>
                    <?= $seasons ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'view/inc/footer.php'; ?>
