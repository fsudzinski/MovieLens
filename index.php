<?php include("header.php");
require_once 'functions.php'; ?>
<main>
  <!-- Tab panes -->
  <div class="tab-content">
    <div class="tab-pane active" id="movies" role="tabpanel" aria-labelledby="view-movies-tab">
      <div class="view-movies-tab">
        <div class="row justify-content-center align-items-center g-2">
          <?php get_all_movies(); ?>
        </div>
      </div>
    </div>

    <div class="tab-pane" id="insertuser" role="tabpanel" aria-labelledby="add-user-tab">
      <div class="col-8">
        <form name="form1" id="id1" action="insert_user.php" method="post">
          <div class="mb-3">
            <label for="" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
          </div>
          <button type="submit" name="n1" id="b2" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

    <div class="tab-pane" id="insertmovie" role="tabpanel" aria-labelledby="add-movie-tab">
      <div class="col-8">
        <form name="form2" id="id2" action="insert_movie.php" method="post">
          <div class="mb-3">
            <label for="" class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId" placeholder="">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Year of release</label>
            <input type="text" class="form-control" name="year" id="year" aria-describedby="helpId" placeholder="">
          </div>
          <div class="mb-3">
            <label for="" class="form-label">Genres</label>
            <select class="form-select" name="genres[]" id="genres" multiple aria-label="genres">
              <?php fill_genres_form(); ?>
            </select>
          </div>
          <button type="submit" name="n1" id="b1" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>
</main>

<?php include("footer.php"); ?>