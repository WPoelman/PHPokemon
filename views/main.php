<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script src="js/pokemon_handler.js" type="application/javascript"></script>

    <!-- Own CSS -->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">
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


            <div class="row justify-content-center">
                    <!-- Button for playing -->
                <!-- todo:Button mooier maken -->
                    <div class="col-md-4 text-center button-div ">
                    <button type="button" class="btn btn-danger" id="PlayButton">
                        <h2 class="ButtonText">Play!</h2>
                    </button>
                    </div>
            </div>
                <!-- Button for how to play -->
                <div class="row justify-content-center">
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

                <!-- Middle text -->
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

                <div class="row">
                    <hr>
                    <div class="col-md-12">
                        <p>Choose 3 pokemon and press Ready!!</p>
                    </div>
                  <hr>
                </div>

            <div class="row">
                <div class="col-md-12 mb-3">
                    <label for="username">Your username: </label>
                    <input class="form-control" id="username" name="username" placeholder="Harrie">
                </div>
            </div>

                <!-- begin row of pokemon -->
                <div class="row">
                    <!-- begin pokemon 1-->
                    <div class="col-md-4 pokemon_choice">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row">
                                    <div class="col-md-9 text-center">
                                        <p class="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-9 text-center">
                                        *insert type image*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- begin pokemon2 -->
                    <div class="col-md-4 pokemon_choice">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row">
                                    <div class="col-md-9 text-center">
                                        <p class="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-9 text-center">
                                        *insert type image*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- begin pokemon 3 -->
                    <div class="col-md-4 pokemon_choice">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row ">
                                    <div class="col-md-9 text-center">
                                        <p class="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-9 text-center">
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
                <div class="col-md-4 pokemon_choice">
                        <div id="Pikachu2">
                            <div id="extra-border">
                                <div class="row">
                                    <div class="col-md-9 text-center">
                                        <p class="name">Pikachu</p>
                                        <p id="image"><img src="media/PokemonImages/pikachu.png" id="pika"></p>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-9 text-center">
                                        *insert type image*
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- begin row 3 -->
                <div class="row">

                </div>

                <!-- begin row 4 -->
                <div class="row">

                </div>

                <!-- Ready button -->

                <div class="row justify-content-center">
                    <div class="col-md-4 text-center button-div">
                        <button type="button" class="btn btn-danger" id="ReadyPokemonChoice">
                            <h2 class="ReadyButton">Ready</h2>
                        </button>
                    </div>
                </div>

            </div>
            </span>
        Attack screen;
        <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- enemy side -->
                    <div class="row enemy flex-row-reverse">
                        <div class="col-md-2">
                            <!-- add img of the enemy pokemon
                             todo: add images of the enemy-->
                             <p id="image"><img src="media/PokemonImages/pikachu.png"></p>
                        </div>
                        <div class="col-md-3">
                            <p>HP:</p>
                            <div class="progress">
                                <!--Om de kleur aan te passen kan je de class veranderen naar:
                                Groen: "progress-bar bg-success" (bij 50-100%)
                                Oranje: "progress-bar bg-warning" (bij 25-50%)
                                Rood: "progress-bar bg-danger"  (bij 1-25%)

                                Om de bar aan te passen kan je in style de width veranderen, volgens mij
                                moet je ook de aria-valuenow aanpassen. Als je dit geleidelijk laat veranderen
                                lijkt het erop dat hij langzaam minder wordt
                                -->
                              <div class="progress-bar bg-success" role="progressbar"
                                   style="width: 100%"
                                   aria-valuenow="100"
                                   aria-valuemin="0"
                                   aria-valuemax="100"></div>
                            </div>
                            <p>Pokemon left:</p>
                            <div class="row">
                                <div class="col-md-1">
                                    <img class="pokeball" src="media/Pokeball-alive.png" id="pokemon-1-enemy">
                                </div>
                                <div class="col-md-1">
                                    <img class="pokeball" src="media/Pokeball-alive.png" id="pokemon-2-enemy">
                                </div>
                                <div class="col-md-1">
                                    <img class="pokeball" src="media/Pokeball-dead.png" id="pokemon-3-enemy">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- allied side -->
                    <div class="row allied">
                        <div class="col-md-2">
                            <!-- add img of the enemy pokemon
                             todo: add images of the enemy-->
                             <p id="image"><img src="media/PokemonImages/pikachu.png"></p>
                        </div>
                        <div class="col-md-3">
                            <p>HP:</p>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar"
                                   style="width: 25%"
                                   aria-valuenow="25"
                                   aria-valuemin="0"
                                   aria-valuemax="100"></div>
                            </div>
                            <p>Pokemon left:</p>
                            <div class="row">
                                <div class="col-md-1">
                                    <img class="pokeball" src="media/Pokeball-dead.png" id="pokemon-1-ally">
                                </div>
                                <div class="col-md-1">
                                    <img class="pokeball" src="media/Pokeball-alive.png" id="pokemon-2-ally">
                                </div>
                                <div class="col-md-1">
                                    <img class="pokeball" src="media/Pokeball-alive.png" id="pokemon-3-ally">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Middle text -->
                <div class="row">
                    <hr>
                    <br>
                    <div class="col-md-12">
                        <p>Your turn! what do you want to do?</p>
                    </div>
                  <hr>
                </div>
                    <!-- attack button -->
                <div class="row justify-content-center">
                    <div class="col-md-3 text-center button-div">
                        <button type="button" class="btn btn-primary" id="AttackButton">
                            <h2 class="ButtonText">Attack</h2>
                        </button>
                    </div>
                    <!-- switch button -->
                    <div class="col-md-3 text-center button-div">
                        <button type="button" class="btn btn-primary" id="SwitchButton">
                            <h2 class="ButtonText">Switch</h2>
                        </button>
                    </div>
                </div>
            </div></span>


    </div>
</div>
</body>
</html>