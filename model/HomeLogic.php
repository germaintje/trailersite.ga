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

        $first_page = 1;

        //TODO: krijg via api call laatste page
        $total_pages = 500;
        $pageURL = $_GET['page'];

        $html = "";
        $html .= "<ul class='pagination pagination-center'>";
        if ($total_pages >= 1 && $pageURL <= $total_pages) {

            //check if page url is the same as firstpage. yes -> disable button
            if($pageURL == $first_page) {
                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=home&page=$first_page'>First</a></li>";
                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=home&page=$first_page'>&laquo;</a></li>";
            }else{
                $previous = $pageURL -1;

                $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$first_page'>first</a></li>";
                $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$previous'>&laquo;</a></li>";
            }


            $i = max(1, $pageURL - 4);
            for (; $i < min($pageURL + 4, $total_pages +1); $i++) {
                if ($i == $pageURL) {
                    $html .= "<li class='page-item active'><a class='page-link' href='?request=home&page=$i'>$i</a></li>";
                }else {
                    $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$i'>$i</a></li>";
                }
            }

            //check if page url is the same as total_pages yes -> disable button
            if($pageURL == $total_pages) {
                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=home&page=1'>&raquo;</a></li>";
                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=home&page=$total_pages'>last</a></li>";
            }else{
                $next = $pageURL +1;

                $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$next'>&raquo;</a></li>";
                $html .= "<li class='page-item'><a class='page-link' href='?request=home&page=$total_pages'>last</a></li>";
            }


            $html .= "</ul>";
            return $html;
        }
    }

}
