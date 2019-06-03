<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>

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
        <h1><?= $page_title ?></h1>
        <h5><?= $page_subtitle ?></h5>
        <p><?= $page_content ?></p>
        <?php if (isset($left_content)) {
            echo $left_content;
        } ?>
        <!-- Left column -->
        <span class="border border-dark"><div class="col-md-12" style="width: 1000px">


            <div class="row">
                    <!-- Button for playing -->
                <!-- todo: Styles in css zetten. Button mooier maken -->
                    <div class="col-md-4 text-center" style="height:250px; width:250px; padding: 20px 20px 20px 20px">
                    <button type="button" class="btn btn-danger"
                            style="width: 100%; height: 100%;" id="PlayButton">
                        <h2 style="color:black; font-size: 64px;">Play!</h2>
                    </button>
                    </div>
            </div>
                <!-- Button for how to play -->
                <div class="row">
                    <div class="col-md-4 text-center" style="height:250px; width:250px; padding: 20px 20px 20px 20px">
                        <button type="button" class="btn btn-info"
                                style="width: 100%; height: 100%;" id="HowToPlayButton">
                            <h2 style="color:black; font-size: 48px;">How to <br>play</h2>
                        </button>
                    </div>
                <!-- Button for more pokemon info -->
                    <div class="col-md-4 text-center" style="height:250px; width:250px; padding: 20px 20px 20px 20px">
                        <button type="button" class="btn btn-primary"
                                style="width: 100%; height: 100%;" id="PokemonInfoButton">
                            <h2 style="color:black; font-size: 48px;">Info</h2>
                        </button>
                    </div>


            </div>

                <div class="row">
                    <hr style="color:#00000">
                    <div class="col-md-12">
                        <p>Welcome to our newest pokemon game!</p>
                    </div>
                  <hr>
                </div>



                </div></span>
        <span class="border border-dark"><div class="col-md-12" style="width: 1000px">

            </div></span>

        <span class="border border-dark"><div class="col-md-12" style="width: 1000px">

            </div></span>

    </div>
</div>
</body>
</html>