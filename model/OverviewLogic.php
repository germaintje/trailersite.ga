<?php
require_once 'DataHandler.php';

class OverviewLogic
{
    private $DataHandler;

    public function __construct()
    {
        $this->DataHandler = new DataHandler();
    }

    public function __destruct()
    {

    }

    public function MoviesOverview($id, $movieID, $search, $genre, $mov_or_tv, $api_type)
    {
        if (!isset($_GET['page']) && empty($_GET['page'])) {
            $page = "1";
        } else {
            $page = $_GET['page'];
        }

        $apiData = $this->DataHandler->apiCall($page, $id, $movieID, $search, $genre, $mov_or_tv, $api_type);

        $html = "";
        foreach ($apiData as $key => $value) {
            if ($key == "results") {
                foreach ($value as $arrayKey => $content) {
                    $stars = $content["vote_average"];
                    $movie_id = $content["id"];

                    if(!empty($content["release_date"])){
                        $release_date = $content["release_date"];
                    }else{
                        $release_date = "";
                    }

                    if(!empty($content["first_air_date"])){
                        $release_date = $content["first_air_date"];
                    }else{
                        $release_date = "";
                    }

//                    $release_date = $content["release_date"];
                    $today = date("Y-m-d");

                    if($release_date < $today){
                        $release_string_date = strtotime($release_date);
                        $year_new_date = date('Y', $release_string_date);
                        $year_new = "<span class='span_corner release_date'>$year_new_date</span>";

                    } else {
                        $year_new = "<span class='span_corner release_date new'>New</span>";
                    }

//                    var_dump($release_date);

                    if(!empty($content["poster_path"])){
                        $imageurl = $content["poster_path"];
                    }else{
                        $imageurl = null;
                    }
//                    $stars = $content["vote_average"];

                    if(!empty($content["title"])){
//                        var_dump($content["original_title"]);
                        $movie_title = $content["title"];
                    }else{
                        $movie_title = "";
                    }

                    if(!empty($content["name"])){
//                        var_dump($content["original_title"]);
                        $serie_name = $content["name"];
                    }else {
                        $serie_name = "";
                    }
                    $title = $movie_title . $serie_name;

                    $html .= "<div class='movie-poster-box col-12 col-sm-6 col-md-4 col-lg-3'>";


                    if(!empty($content["original_title"])){
                        $html .= "<a href='?request=movieDetail&mov_id=$movie_id' title='$title' class='home-movie-link'>";
                    }

                    if(!empty($content["original_name"])){
                        $html .= "<a href='?request=serieDetail&mov_id=$movie_id' title='$title' class='home-movie-link'>";
                    }

                    $html .= "<span class='span_corner vote_average'>$stars</span>";
                    $html .= $year_new;

                    if ($imageurl == null) {
                        $html .= "<img src='view/images/not_found_poster.jpg' width='200' height='300' alt='Not Found'><br>";
                    } else {
                        $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' width='200' height='300' alt=''><br>";
                    }

                    $html .= mb_strimwidth($title, 0, 25, '...') . "</a>";

                    $html .= "</div>";
                }
            }
        }
        include 'Utilities/Pagination.php';

        return $html;
    }

    /**
     * A list of all the genres
     */
    public function collectGenresList($id, $mov_or_tv, $api_type)
    {
        $res = $this->DataHandler->apiCall($page = null, $id, $movie_id = null, $search = null, $genre = null, $mov_or_tv, $api_type);

        $html = "";
        foreach ($res as $genreArray) {
            foreach ($genreArray as $genre) {
                foreach ($genre as $key => $value) {
                    if ($key == "id") {
                        $genreID = $value;
                    }
                    if ($key == "name") {
                        $html .= "<div class='col-5 col-md-3'><a href='?request=GenreMovies&genre=$genreID&genreName=$value' class='genre-link'>$value</a></div>";
                    }
                }
            }
        }

        return $html;
    }

//    public function LogIn()
//    {
//
//        $con = $this->DataHandler->login($con);
//
//        if (isset($_POST['but_submit'])) {
//
//            $uname = mysqli_real_escape_string($con, $_POST['txt_uname']);
//            $password = mysqli_real_escape_string($con, $_POST['txt_pwd']);
//
//            if ($uname != "" && $password != "") {
//
//                $sql_query = "select count(*) as cntUser from users where username='" . $uname . "' and password='" . $password . "'";
//                $result = mysqli_query($con, $sql_query);
//                $row = mysqli_fetch_array($result);
//
//                $count = $row['cntUser'];
//
//                if ($count > 0) {
//                    $_SESSION['uname'] = $uname;
//                    header('Location: home.php');
//                } else {
//                    echo "Invalid username and password";
//                }
//
//            }
//
//        }
//    }

}
