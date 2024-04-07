<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="col-8">
        <form action="insert_rating.php" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Username:</label>
                <input type="text" class="form-control" name="username" id="username" aria-describedby="helpId"
                    placeholder="Anonymous if empty" value="">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Rating</label>
                <select class="form-select" aria-label="select" name="rating", id="rating">
                    <option value="0.5">0.5</option>
                    <option value="1.0">1.0</option>
                    <option value="1.5">1.5</option>
                    <option value="2.0">2.0</option>
                    <option value="2.5">2.5</option>
                    <option value="3.0">3.0</option>
                    <option value="3.5">3.5</option>
                    <option value="4.0">4.0</option>
                    <option value="4.5">4.5</option>
                    <option selected value="5.0">5.0</option>
                </select>
            </div>
            <div class="mb-3">
                <input type="hidden" id="id" name="id" value="<?php echo ($_GET["id"]); ?>">
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