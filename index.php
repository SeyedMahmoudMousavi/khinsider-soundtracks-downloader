<?php
require_once "./vendor/autoload.php";
?>

<!doctype html>
<html lang="en">

<head>
    <title>Khinsider soundtracks downloader</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="include/colors.css">

</head>

<body class="bg-color-4 color-2">
    <header class="container pt-3">
        <!-- place navbar here -->
        <?php if (error()) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong><?= error(); ?></strong>
            </div>
        <?php endif; ?>

    </header>
    <main class="container pb-3 align-middle">

        <div class="row justify-content-center align-items-center">
            <div class="col-8">
                <h1 class="bg-color-3 rounded p-3 text-center">Khinsider soundtracks downloader</h1>
                <form action="src/factory.php">
                    <div class="mb-3">
                        <label for="album_url" class="form-label color-2">Album link</label>
                        <input type="url" class="form-control" name="album_url" id="album_url" aria-describedby="helpId" placeholder="https://downloads.khinsider.com" required>
                        <small id="helpId" class="form-text color-2">enter your album list from <a href="http://downloads.khinsider.com" target="_blank" class="text-danger">downloads.khinsider.com</a> website</small>
                    </div>
                    <div class="mb-3 form-check">
                        <label class="form-check-label color-2" for="show">
                            show links?
                        </label>
                        <input class="form-check-input bg-dark" type="checkbox" name="show" id="show" checked>
                    </div>
                    <button type="submit" class="btn bg-color-3 bg-color-2-hover color-4-hover">Get album</button>
                </form>
            </div>
            <div class="col-4"><img src="include/img/ghost.jpg" class="img-fluid rounded"></div>
        </div>
        <hr>
        <span>Download list : <a href="exported/<?= session('fileName'); ?>" target="_blank" download><?= session('fileName'); ?></a></span>
        <hr>
        <?php $musicList = explode("\n", (string)session('showResult')); ?>
        <?php foreach ($musicList as $musicLink) : ?>
            <?php
            $musicName = pathinfo($musicLink, PATHINFO_BASENAME);
            $musicName = str_replace('.mp3', '', $musicName);
            $musicName = urldecode($musicName);
            ?>
            <span class="align-middle"><?= $musicName; ?> : <audio class="align-middle" src="<?= $musicLink; ?>" preload='none' controls></audio></span>
            <hr>
        <?php endforeach; ?>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
<?php
error_delete();
// session_delete('fileName');
?>