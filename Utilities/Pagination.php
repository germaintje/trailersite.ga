<?php
//class Pagination{
//
//    public function Pagination_Overview($apiData)
//    {
//        /*
//         * ik heb voor nu een $_GET gebruikt om de pagenumber te krijgen
//         * het kan maar miss later veranderen om via api call de current page number te krijgen
//         *
//         * TODO: - max_result pages ophalen API call
//         * TODO: - verwerken met hardcoded wat het nu is
//         *
//         * TODO: - pagination word nog veranderd naar previous next als dat mooier is
//         */
//
//        if(!isset($_GET['page']) && empty($_GET['page'])){
//            $page = "1";
//        }else{
//            $page = $_GET['page'];
//        }
//
//        $first_page = 1;
//        if(!isset($_GET['request'])){
//            $request = "popularMovies";
//        }else {
//            $request = $_GET['request'];
//        }
//
//        //TODO: krijg via api call laatste page
//        var_dump($apiData);
//        $total_pages = $apiData['total_pages'];;
//        if ($page) {
//            $pageURL = $page;
//        } else {
//            $pageURL = 1;
//        }
//
//        $html = "";
//        $html .= "<ul class='pagination pagination-center'>";
//        if ($total_pages >= 1 && $pageURL <= $total_pages) {
//
//            //check if page url is the same as firstpage. yes -> disable button
//            if ($pageURL == $first_page) {
//                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=$first_page'>First</a></li>";
//                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=$first_page'>&laquo;</a></li>";
//            } else {
//                $previous = $pageURL - 1;
//
//                $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$first_page'>first</a></li>";
//                $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$previous'>&laquo;</a></li>";
//            }
//
//            $i = max(1, $pageURL - 4);
//            for (; $i < min($pageURL + 4, $total_pages + 1); $i++) {
//                if ($i == $pageURL) {
//                    $html .= "<li class='page-item active'><a class='page-link' href='?request=$request&page=$i'>$i</a></li>";
//                } else {
//                    $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$i'>$i</a></li>";
//                }
//            }
//
//            //check if page url is the same as total_pages yes -> disable button
//            if ($pageURL == $total_pages) {
//                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=1'>&raquo;</a></li>";
//                $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=$total_pages'>last</a></li>";
//            } else {
//                $next = $pageURL + 1;
//
//                $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$next'>&raquo;</a></li>";
//                $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$total_pages'>last</a></li>";
//            }
//
//            $html .= "</ul>";
//
//        }
//        return $html;
//    }
//
//}

$first_page = 1;
if(!isset($_GET['request'])){
    $request = "popularMovies";
}elseif ($id == "Search"){
    $request = $_GET['request'] . "&search=" . $_GET['search'];
}elseif($id == "Similar"){
    $request = $_GET['request'] . "&mov_id=" . $_GET['mov_id'];
}elseif ($id == "Overview_genre"){
    $request = $_GET['request'] . "&genre=" . $_GET['genre'] . "&genreName=" . $_GET['genreName'];
}else {
    $request = $_GET['request'];
}

$total_pages = $apiData['total_pages'];;
if ($page) {
$pageURL = $page;
} else {
$pageURL = 1;
}

$html .= "<ul class='pagination pagination-center'>";
    if ($total_pages >= 1 && $pageURL <= $total_pages) {

    //check if page url is the same as firstpage. yes -> disable button
    if ($pageURL == $first_page) {
    $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=$first_page'>First</a></li>";
    $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=$first_page'>&laquo;</a></li>";
    } else {
    $previous = $pageURL - 1;

    $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$first_page'>first</a></li>";
    $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$previous'>&laquo;</a></li>";
    }

    $i = max(1, $pageURL - 4);
    for (; $i < min($pageURL + 4, $total_pages + 1); $i++) {
    if ($i == $pageURL) {
    $html .= "<li class='page-item active'><a class='page-link' href='?request=$request&page=$i'>$i</a></li>";
    } else {
    $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$i'>$i</a></li>";
    }
    }

    //check if page url is the same as total_pages yes -> disable button
    if ($pageURL == $total_pages) {
    $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=1'>&raquo;</a></li>";
    $html .= "<li class='page-item disabled'><a class='page-link' href='?request=$request&page=$total_pages'>last</a></li>";
    } else {
    $next = $pageURL + 1;

    $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$next'>&raquo;</a></li>";
    $html .= "<li class='page-item'><a class='page-link' href='?request=$request&page=$total_pages'>last</a></li>";
    }

    $html .= "</ul>";

}
    ?>
