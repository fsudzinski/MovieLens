<!doctype html>
<html lang="en">

<head>
    <title>Movie-lens</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <meta name="description" content="Movie-lens dataset management">
    <meta name="keywords" content="movie, genre, rating, view, update, delete, insert">
    <meta name="author" content="148101">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="view-movies-tab" data-bs-toggle="tab" data-bs-target="#movies"
                    type="button" role="tab" aria-controls="movies" aria-selected="true">View movies</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="add-movie-tab" data-bs-toggle="tab" data-bs-target="#insertmovie"
                    type="button" role="tab" aria-controls="insertmovie" aria-selected="false">Insert movie</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="add-user-tab" data-bs-toggle="tab" data-bs-target="#insertuser"
                    type="button" role="tab" aria-controls="insertuser" aria-selected="false">Add user</button>
            </li>
        </ul>
    </header>