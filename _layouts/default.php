<!DOCTYPE html>
<html lang="<?php site('locale'); ?>">
	<?php snippet('head') ?>

    <body>

        <nav class="navbar navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand" href="#">
              <img src="assets/img/first-look-logo.png" alt="First Look Logo" width="auto" height="24" class="d-inline-block align-text-top"> <strong>First Look</strong>
            </a>
          </div>
        </nav>

        <div class="container-fluid bg-primary min-vw-100">
            <div class="container mt-5">
                <?php $md->content(); ?>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
