<?php
require_once 'db_connection.php';
function get_all_movies()
{
    global $conn;
    $result = $conn->query("SELECT * FROM movies"); #  WHERE movieId < 100
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-4" style="width: 4">
            <div class="card border-primary">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo
                            ($row["title"]) ?>
                    </h4>
                    <p class="card-text">
                        <?php echo
                            ($row["genres"]) ?>
                    </p>
                    <a name="Update" id="update" class="btn btn-primary"
                        href="modify_movie.php?id=<?php echo ($row["movieId"]) ?>" role="button">Update</a>
                    <a name="Ratings" id="ratings" class="btn btn-primary"
                        href="view_ratings.php?id=<?php echo ($row["movieId"]) ?>" role="button">Ratings</a>
                    <a name="Tags" id="addrating" class="btn btn-primary" href="add_rating.php?id=<?php echo ($row["movieId"]) ?>"
                        role="button">Add rating</a>
                    <a name="Tags" id="tags" class="btn btn-primary" href="view_tags.php?id=<?php echo ($row["movieId"]) ?>"
                        role="button">Tags</a>
                    <a name="Tags" id="addtag" class="btn btn-primary" href="add_tag.php?id=<?php echo ($row["movieId"]) ?>"
                        role="button">Add tag</a>
                    <a name="Delete" id="delete" class="btn btn-danger"
                        href="delete_movie.php?id=<?php echo ($row["movieId"]) ?>" role="button">Delete</a>
                </div>
            </div>
        </div>
        <?php
    }
}

function fill_movie_ratings($movieId)
{
    global $conn;
    $result = $conn->query("SELECT userId, rating, timestamp FROM ratings WHERE movieId=" . $movieId . " ORDER BY rating DESC");
    while ($row = mysqli_fetch_assoc($result)) {
        $user = $conn->query("SELECT name FROM users WHERE userId=" . $row["userId"]);
        $user_row = mysqli_fetch_assoc($user);
        $name = "";
        if (is_null($user_row['name'])) {
            $name = "Anonymous";
        } else
            $name = $user_row['name'];
        ?>
        <div class="col-3">
            <div class="card border-primary">
                <div class="card-header">
                    <?php echo ($name) ?>:
                    <?php echo ($row["rating"]) ?>
                </div>
                <div class="card-body">
                    <p class="card-text">Date:
                        <?php echo date('M j Y g:i A', $row["timestamp"]) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
}

function fill_movie_tags($movieId)
{
    global $conn;
    $result = $conn->query("SELECT userId, tag, timestamp FROM tags WHERE movieId=" . $movieId . " ORDER BY userId");
    while ($row = mysqli_fetch_assoc($result)) {
        $user = $conn->query("SELECT name FROM users WHERE userId=" . $row["userId"]);
        $user_row = mysqli_fetch_assoc($user);
        $name = "";
        if (is_null($user_row['name'])) {
            $name = "Anonymous";
        } else
            $name = $user_row['name'];
        ?>
        <div class="col-3">
            <div class="card border-primary">
                <div class="card-header">
                    <?php echo ($name) ?>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        <?php echo ($row["tag"]) ?>
                    </p>
                    <p class="card-text">Date:
                        <?php echo date('M j Y g:i A', $row["timestamp"]) ?>
                    </p>
                    <a name="Delete" id="delete" class="btn btn-danger" href="delete_tag.php?movieId=<?php echo ($movieId) ?>&amp;userId=<?php echo ($row["userId"]) ?>&amp;tag=<?php echo ($row["tag"]) ?>
                        &amp;timestamp=<?php echo ($row["timestamp"]) ?>" role="button">Delete</a>
                </div>
            </div>
        </div>
        <?php
    }

}

function get_ratings_by_movieId($movieId)
{
    global $conn;
    $result = $conn->query("SELECT rating, count(rating) AS occurences FROM ( SELECT rating FROM ratings WHERE movieId=" . $movieId . ") AS t GROUP BY rating");
    $array = array_fill(0, 10, 0);
    while ($row = mysqli_fetch_assoc($result)) {
        $array[$row["rating"] / 0.5 - 0.5] = $row["occurences"];
    }
    return $array;
}

function get_average_rating_by_movieId($movieId)
{
    global $conn;
    $result = $conn->query("SELECT AVG(rating) AS average FROM ratings WHERE movieId=" . $movieId);
    $row = mysqli_fetch_assoc($result);
    return $row["average"];
}

function fill_genres_form()
{
    global $conn;
    $result = $conn->query("SELECT name FROM genres");
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["name"] != "(no genres listed)") {
            ?>
            <option value="<?php echo ($row["name"]) ?>"><?php echo ($row["name"]) ?></option>
            <?php
        }
    }
}

function insert_movie_genre($movieId, $genre)
{
    global $conn;
    $result = $conn->query("SELECT genreId FROM genres WHERE name='" . $genre . "'");
    $row = mysqli_fetch_assoc($result);
    $conn->query("INSERT INTO movies_genres(movieId, genreId) VALUES(" . $movieId . ", " . $row["genreId"] . ")");
}

function insert_movie($title, $genres)
{
    global $conn;
    $conn->query("INSERT INTO movies(title, genres) VALUES('" . $title . "', '" . $genres . "')");
}

function update_movie($movieId, $title, $genres)
{
    global $conn;
    $conn->query("UPDATE movies SET title='" . $title . "', genres='" . $genres . "' WHERE movieId=" . $movieId);
}

function clear_genres($movieId)
{
    global $conn;
    $conn->query("DELETE FROM movies_genres WHERE movieId=" . $movieId);
}

function delete_movie($movieId)
{
    global $conn;
    $conn->query("DELETE FROM movies WHERE movieId=" . $movieId);
}

function get_movie_by_movieId($movieId)
{
    global $conn;
    $result = $conn->query("SELECT title, genres FROM movies WHERE movieId=" . $movieId);
    $row = mysqli_fetch_assoc($result);
    return $row;
}

function insert_tag($userId, $movieId, $tag, $timestamp)
{
    global $conn;
    $conn->query("INSERT INTO tags VALUES(" . $userId . ", " . $movieId . ", '" . $tag . "', " . $timestamp . ")");
}

function insert_user($name)
{
    global $conn;
    $conn->query("INSERT INTO users(name) VALUES('" . $name . "')");
}

function insert_null_user()
{
    global $conn;
    $conn->query("INSERT INTO users(name) VALUES(NULL)");
}

function get_userId_by_name($name)
{
    global $conn;
    $result = $conn->query("SELECT userId FROM users WHERE name='" . $name . "'");
    $row = mysqli_fetch_assoc($result);
    if(empty($row)){
        return false;
    }
    else{
        return $row["userId"];
    }
    
}

function delete_tag($userId, $movieId, $tag, $timestamp)
{
    global $conn;
    $conn->query("DELETE FROM tags WHERE userId=" . $userId . " and movieId=" . $movieId . " and tag='" . $tag . "' and timestamp=" . $timestamp);
}

function insert_rating($userId, $movieId, $rating, $timestamp){
    global $conn;
    $conn->query("INSERT INTO ratings VALUES(" . $userId . ", " . $movieId . ", " . $rating . ", " . $timestamp . ")");
}

?>