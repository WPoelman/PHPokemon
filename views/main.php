<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       
        <!-- Own CSS -->
        <link rel="stylesheet" href="css/styles.css">

        <title><?= $page_title ?></title>
    </head>
    <body>
        <!-- Menu -->
        <?= $navigation ?>

        <!-- Content -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <figure>
                        <img src="media/PHPokemon.png"
                             alt=""
                             width="900"
                             height="124">
                    </figure>
                </div>
            </div>
            <div class="row">

                <!-- Left column -->
                <div class="col-md-10">

                    <h1><?= $page_title ?></h1>
                    <h5><?= $page_subtitle ?></h5>
                    <p><?= $page_content ?></p>
                    <?php if(isset($left_content)){echo $left_content;} ?>

                    <!-- Button for playing -->
                    <!-- todo: Styles in css zetten. Button mooier maken -->
                    <div style="height:300px">
                    <button type="button" class="btn btn-danger"
                    style="width: 100%; height: 100%;" >
                        Play!
                    </button>
                    </div>
                </div>

            </div>
        </div>
    </body>
</html>