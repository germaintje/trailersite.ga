<?php


class HomeLogic
{

    public function constructHome($apiData)
    {
        $html = "";
        $ip = $_SERVER["REMOTE_ADDR"];
        foreach ($apiData as $key => $value) {
            if ($key == "results") {
                foreach ($value as $arrayKey => $content) {
                    $movie_id = $content["id"];
                    $movie_title = $content["original_title"];
                    $imageurl = $content["poster_path"];
                    $videospider_url = file_get_contents("https://vsrequest.video/request.php?key=DBUBFDLOJCRjoGBA&secret_key=nzgbf338ysoh17zbrida1f4xrvt74d&video_id=$movie_id&tmdb=1&ip=$ip");

                    $html .= "<div class='movie-poster-box col-12 col-sm-6 col-md-4 col-lg-3'>";
                    $html .= "<a href='?request=watch&link=$videospider_url&mov_id=$movie_id' title='$movie_title' class='home-movie-link'>";
                    $html .= "<img src='http://image.tmdb.org/t/p/w185$imageurl' alt=''><br>";
                    $html .= mb_strimwidth($movie_title, 0, 25, '...') . "</a>";
                    $html .= "</div>";
                }
            }
        }
        return $html;
    }

    public function HomePagination($apiData)
    {
        $html = "";

        foreach ($apiData as $key => $value) {

            $maxpage = $value['page'];
            var_dump($maxpage);




            $html .= "";
        }
        return $html;
    }


}
