<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $page_title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="application/javascript" src="js/pokemonlist.js"></script>

</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">WP19</a>
        <ul class="navbar-nav mr-auto">
            <?php $active = $navigation['active']; ?>
            <?php foreach($navigation['items'] as $title => $url){
                if ($title == $active){ ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= $url ?>"><?= $title ?></a>
                    </li>
                <?php } else {?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $url ?>"><?= $title ?></a>
                    </li>
                <?php } ?>
            <?php } ?>
        </ul>
    </nav>
</header>


