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

</head>

<body class="bg-dark text-white">
    <header class="container pt-3">
        <!-- place navbar here -->
        <?php if (error()) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong><?= error(); ?></strong>
            </div>
        <?php endif; ?>

    </header>
    <main class="container pb-3">
        <h1 class="bg-primary rounded p-3 text-center">Khinsider soundtracks downloader</h1>
        <audio src="./include/03 They're Back.mp3" autoplay></audio>
        <form action="src/factory.php">
            <div class="mb-3">
                <label for="album_url" class="form-label">Album link</label>
                <input type="url" class="form-control" name="album_url" id="album_url" aria-describedby="helpId" placeholder="https://downloads.khinsider.com/game-soundtracks/album/streets-of-rage-4-original-soundtrack" required>
                <small id="helpId" class="form-text text-light">enter your album list from <a href="http://downloads.khinsider.com" target="_blank" class="text-danger">downloads.khinsider.com</a> website</small>
            </div>
            <div class="mb-3 form-check">
                <label class="form-check-label" for="show">
                    show links?
                </label>
                <input class="form-check-input bg-secondary" type="checkbox" name="show" id="show" checked>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php if (session('showResult')) : ?>
            <pre class="my-3 p-3 rounded bg-light text-dark"><?php e_session('showResult'); ?></pre>
        <?php endif; ?>
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
session('error', '');
// session_unset();
?>