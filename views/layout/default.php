<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); ?>
    <title><?= isset($title) ? htmlentities($title) : 'Planning' ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script>x=document.getElementsByTagName("th")</script>
</head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a href="#" class="navbar-brand">Planning</a>
        </nav>

        <div class="container mt-4">
            <?= $content ?>
        </div>
    </body>

    <footer class="bg-light py-4 footer mt-auto">
        <div class="container">
            <?php if(defined('DEBUG_TIME')): ?>
                Page générée en <?= round(1000 * (microtime(true) - DEBUG_TIME)) ?> ms
            <?php endif; ?>
        </div>
    </footer>
</html>