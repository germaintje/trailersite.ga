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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark"><a class="navbar-brand" href="?request=popularMovies" data-abc="true">BOOTSTRAP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
            aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarColor02">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="?request=popularMovies&page=1" data-abc="true">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="?request=genres" data-abc="true">Genres</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Pricing</a></li>
            <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Social</a></li>
        </ul>

        <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
            <input class="form-control mr-sm-2" type="hidden" name="request" value="search">
            <input class="form-control mr-sm-2" type="text" name="search" placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit" value="Search">Search</button>
        </form>

    </div>
</nav>
