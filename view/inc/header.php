<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>title</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <meta name="propeller" content="f626edb4c62c55505c667023ae81b59e">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css" type="text/css">
    <noscript>Please turn on javascript in your browser settings</noscript>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" role="navigation">
    <div class="container">
<!--                <a class="navbar-brand" href="?request=PopularMovies"><img class='navbar-brand' src='view/images/watchnet-logo.png' height='100' width="300" 'Not Found'></a>-->
        <a class="navbar-brand" href="?request=PopularMovies">Watchnet</a>
        <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
            &#9776;
        </button>
        <div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movies</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a href="?request=PopularMovies&page=1" class="dropdown-item">Popular</a>
                            <a href="?request=UpcomingMovies&page=1" class="dropdown-item">Upcoming</a>
                            <a href="?request=NowPlayingMovies&page=1" class="dropdown-item">Now Playing</a>
                            <a href="?request=TopRatedMovies&page=1" class="dropdown-item">Top Rated</a>
                        </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Series / TV Shows</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a href="?request=PopularSeries&page=1" class="dropdown-item">Popular</a>
                    </div>
                </li>
                <li class="nav-item"><a href="?request=Genres" class="nav-link">Genres</a></li>
            </ul>

                <form class="form-inline search" action="index.php" method="GET">
                    <input class="form-control mr-sm-2" type="hidden" name="request" value="Search">
                    <input class="form-control mr-sm-2 nav-search" type="search" name="search" placeholder="Search" aria-label="Search">
<!--                    <button class="btn btn-secondary my-2 my-sm-0" type="submit" value="Search">Search</button>-->
                </form>

            <?php
            if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
                ?>
                <ul class='nav navbar-nav flex - row justify-content-between ml-auto'>
                    <li class='dropdown order-1'>
                        <button type='button' id='dropdownMenu1' data-toggle='dropdown' class='btn btn-outline-secondary dropdown-toggle'>Login <span class='caret'></span></button>
                        <ul class='dropdown-menu dropdown-menu-right mt-2 login-modal'>
                            <li class='px-3 py-2'>
                                <?php include "view/login/login.php"; ?>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php } else { ?>
            <ul class='nav navbar-nav flex - row justify-content-between ml-auto'>
                <li class='nav-item'><a href='#' class='nav-link' title='settings'><i class='fa fa-cog fa-fw fa-lg'></i></a></li>
                <?php echo "<li class='nav-item'><span class='navbar-text'>Hello " . $_SESSION['username'] . "</span></li>";?>
                <li class='nav-item'><a class='nav-link' href='view/login/logout.php'>logout</a></li>
            </ul>
            <?php } ?>
        </div>
    </div>
</nav>

<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<div class="main_body">

