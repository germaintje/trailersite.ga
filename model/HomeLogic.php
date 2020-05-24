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
        /*
         * ik heb voor nu een $_GET gebruikt om de pagenumber te krijgen
         * het kan maar miss later veranderen om via api call de current page number te krijgen
         *
         * TODO: - max_result pages ophalen API call
         * TODO: - verwerken met hardcoded wat het nu is
         *
         * TODO: - pagination word nog veranderd naar previous next als dat mooier is
         */

//        foreach ($apiData as $key => $value) {
//            $maxpage = $value['total_pages'];
//    }

        $total_pages = 501;
        $limit = 5;
        $pageURL = $_GET['page'];

        $html = "";
        $html .= "<ul class='pagination justify-content-center'>";
        if ($total_pages >= 1 && $pageURL <= $total_pages) {
            $previous = 1;
            if ($pageURL == 1) {
                $previous = $pageURL;
                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=home&page=$previous'>$previous</a></li>";
            }elseif($pageURL < 6){
                $previous = $pageURL -6;
                $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$previous'>$previous</a></li>";
            }else {
                $previous = $pageURL -6;
                $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$previous'>$previous</a></li>";
            }

            $i = max(2, $pageURL - 5);
//            if ($i > 2)
//                $html .= "...";
            for (; $i < min($pageURL + 6, $total_pages); $i++) {
                if ($i == $pageURL) {
                    $html .= "<li class='page-item active'><a class='page-link' href='?request=home&page=$i'>$i</a></li>";
                } else {
                    $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$i'>$i</a></li>";
                }
            }
//            if ($i != $total_pages)
//                $html .= "...";
            $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$total_pages'>$total_pages</a></li>";

            $html .= "</ul>";
            return $html;
        }
    }

}
