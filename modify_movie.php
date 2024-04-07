<?php require_once 'functions.php'; 
$row = get_movie_by_movieId($_GET["id"]);

preg_match('(\([0-9]*\))', $row["title"], $match);
$year =  $match[0];
$title = rtrim($row["title"], " " . $year);
$year = rtrim($year, ")");
$year = ltrim($year, "(");
?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="col-8">
        <form action="update_movie.php" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Title:</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder=""
                    value="<?php echo $title?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Year of release</label>
                <input type="text" class="form-control" name="year" id="year" aria-describedby="helpId" value="<?php echo $year?>" placeholder="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Genres</label>
                <select class="form-select" name="genres[]" id="genres" multiple aria-label="genres" size="10">
                    <?php fill_genres_form(); ?>
                </select>
            </div>
            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="<?php echo($_GET["id"]); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>            
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>

</body>

</html>