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
        Index pagina:
        <span class="border border-dark"><div class="col-md-12 main-box">


            <div class="row">
                    <!-- Button for playing -->
                <!-- todo: Styles in css zetten. Button mooier maken -->
                    <div class="col-md-4 text-center button-div">
                    <button type="button" class="btn btn-danger" id="PlayButton">
                        <h2 class="ButtonText">Play!</h2>
                    </button>
                    </div>
            </div>
                <!-- Button for how to play -->
                <div class="row">
                    <div class="col-md-4 text-center button-div">
                        <button type="button" class="btn btn-info" id="HowToPlayButton">
                            <h2 class="ButtonText">How to <br>play</h2>
                        </button>
                    </div>
                    <!-- Button for more pokemon info -->
                    <div class="col-md-4 text-center button-div">
                        <button type="button" class="btn btn-primary" id="PokemonInfoButton">
                            <h2 class="ButtonText">Info</h2>
                        </button>
                    </div>


            </div>

                <div class="row">
                    <hr>
                    <br>
                    <div class="col-md-12">
                        <p>Welcome to our newest pokemon game!</p>
                    </div>
                  <hr>
                </div>
                </div></span>

        <!-- select pokemon page -->
        Select pokemon:

            <span class="border border-dark">
            <div class="col-md-12 main-box">
                <!-- begin row of pokemon -->
                <div class="row">
                    <!-- begin pokemon 1-->
                    <div class="col-md-4">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p id="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        *insert type image*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- begin pokemon2 -->
                    <div class="col-md-4">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p id="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        *insert type image*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- begin pokemon 3 -->
                    <div class="col-md-4">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p id="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        *insert type image*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row 1-->
                </div>
                <!-- begin row 2 -->
                <div class="row">

                </div>

            </div>

            </span>

            <span class="border border-dark"><div class="col-md-12 main-box">

            </div></span>


    </div>
</div>
</body>
</html>