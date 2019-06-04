<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap / Google Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,400i,700&display=swap" rel="stylesheet">

    <!-- Scripts -->
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

    <!-- Container -->
    <div class="container">

        <!-- Logo -->
        <div class="row">
            <div class="col-md-12">
                <figure>
                    <img src="media/PHPokemon.png" alt="" width="900" height="124">
                </figure>
            </div>
        </div>

        <!--            -->
        <!-- Homescreen -->
        <!--            -->
        <div class="row" id="homescreen">
            <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- Button for playing -->
                    <!-- todo:Button mooier maken -->
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center button-div ">
                            <button type="button" class="btn btn-danger" id="PlayButton">
                                <h2 class="ButtonText">Play!</h2>
                            </button>
                        </div>
                    </div>

                    <!-- Button for how to play -->
                    <div class="row justify-content-center">
                        <div class="col-md-4 text-center button-div">
                            <a type="button" class="btn btn-info" id="HowToPlayButton" href="instructions">
                                <h2 class="ButtonText smallertext">How to <br>play</h2>
                            </a>
                        </div>
                        <!-- Button for more pokemon info -->
                        <div class="col-md-4 text-center button-div">
                            <button type="button" class="btn btn-primary" id="PokemonInfoButton">
                                <h2 class="ButtonText smallertext">List of <br> available Pokémon</h2>
                            </button>
                        </div>
                    </div>

                    <!-- Middle text -->
                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <p class="text-center Middle-Text">Welcome to our newest pokemon game!</p>
                        </div>
                        <hr>
                    </div>

                </div>
            </span>
        </div>

        <!--                    -->
        <!-- Pre game selection -->
        <!--       screen       -->
        <div class="row" id="pre_game_selection_screen">
            <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- Instructions -->
                    <div class="row">
                        <hr>
                        <div class="col-md-12">
                            <p class="text-center Middle-Text">Choose 3 pokemon and an Username and then press Ready!!
                            </p>
                        </div>
                        <hr>
                    </div>

                    <!-- Username input -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 mb-3">
                            <label for="username">
                                <h4>Your username:</h4>
                            </label>
                            <input class="form-control" id="username" name="username" placeholder="Harrie">
                        </div>
                    </div>

                    <!-- Instructions -->
                    <div class="row wp-row">
                        <div class="col-md-12 intro">
                            <h1>List of Pokémon</h1>
                            <p>Below is an overview of the 12 available Pokémon to choose from.</p>
                            <p id="smallerinfo">For the full information about every Pokémon's stats and movesets,
                                please <br>
                                see the information page.
                            </p>
                        </div>
                    </div>

                    <!-- Fire row -->
                    <div class="row wp-row">
                        <!-- Pokemon 1 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Charmander" class="pokemon fire-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Charmander</p>
                                            <p class="image"><img src="media/PokemonImages/charmander.png"
                                                    class="sprite bouncing"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Fire</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>39</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>52</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>43</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>66</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pokemon 2 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Vulpix" class="pokemon fire-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Vulpix</p>
                                            <p class="image"><img src="media/PokemonImages/vulpix.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Fire</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>43</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>48</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>38</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>65</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of fire row -->

                    <!-- Water row -->
                    <div class="row wp-row">
                        <!-- Pokemon 3 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Squirtle" class="pokemon water-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Squirtle</p>
                                            <p class="image"><img src="media/PokemonImages/squirtle.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Water</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>44</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>38</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>65</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>43</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pokemon 4 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Staryu" class="pokemon water-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Staryu</p>
                                            <p class="image"><img src="media/PokemonImages/staryu.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Water</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>35</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>44</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>45</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>85</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of water row -->

                    <!-- Grass row -->
                    <div class="row wp-row">
                        <!-- Pokemon 5 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Bulbasaur" class="pokemon grass-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Bulbasaur</p>
                                            <p class="image"><img src="media/PokemonImages/bulbasaur.png" class="sprite"
                                                    id="bulba"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Grass</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>45</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>49</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>49</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>45</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pokemon 6 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Oddish" class="pokemon grass-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Oddish</p>
                                            <p class="image"><img src="media/PokemonImages/oddish.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Grass</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>45</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>50</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>55</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>30</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of grass row -->

                    <!-- Electric row -->
                    <div class="row wp-row">
                        <!-- Pokemon 7 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Pikachu" class="pokemon electric-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Pikachu</p>
                                            <p class="image"><img src="media/PokemonImages/pikachu.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Electric</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>45</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>55</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>30</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>90</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pokemon 8 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Magnemite" class="pokemon electric-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Magnemite</p>
                                            <p class="image"><img src="media/PokemonImages/magnemite.png"
                                                    class="sprite"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Electric</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>25</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>60</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>70</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>44</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of electric pokemon row -->

                    <!-- Normal row -->
                    <div class="row wp-row">
                        <!-- Pokemon 9 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Rattata" class="pokemon normal-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Rattata</p>
                                            <p class="image"><img src="media/PokemonImages/rattata.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Normal</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>30</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>56</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>35</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>72</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pokemon 10 -->
                        <div class="col-md-6 pokemon_choice">
                            <div id="Eevee" class="pokemon normal-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Eevee</p>
                                            <p class="image"><img src="media/PokemonImages/eevee.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Normal</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>45</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>50</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>47</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>55</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of normal pokemon row -->

                    <!-- Rock row -->
                    <div class="row wp-row">
                        <!-- Pokemon 11 -->
                        <div class="col-md-6">
                            <div id="Geodude" class="pokemon rock-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Geodude</p>
                                            <p class="image"><img src="media/PokemonImages/geodude.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Rock</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>40</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>60</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>70</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>20</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pokemon 12 -->
                        <div class="col-md-6">
                            <div id="Omanyte" class="pokemon rock-type">
                                <div class="extra-border">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <p class="name">Omanyte</p>
                                            <p class="image"><img src="media/PokemonImages/omanyte.png" class="sprite">
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="stats">
                                                <tr>
                                                    <td><b>Element</b></td>
                                                    <td>Rock</td>
                                                </tr>
                                                <tr>
                                                    <td><b>HP</b></td>
                                                    <td>35</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Attack</b></td>
                                                    <td>40</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Defense</b></td>
                                                    <td>90</td>
                                                </tr>
                                                <tr>
                                                    <td><b>Speed</b></td>
                                                    <td>35</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- End of rock pokemon row -->

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
        </div>

        <!--                  -->
        <!-- Main game screen -->
        <!--                  -->
        <div class="row" id="main_game_screen">
            <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- Enemy side -->
                    <div class="row enemy flex-row-reverse">
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
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
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
                        <div class="col-md-2">
                            <!-- add img of the enemy pokemon
                             todo: add images of the enemy-->
                            <p class="image"><img src="media/PokemonImages/pikachu.png"></p>
                        </div>
                    </div>

                    <!-- Allied side -->
                    <div class="row allied top-buffer">
                        <div class="col-md-3 ">
                            <p>HP:</p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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

                        <div class="col-md-2">
                            <!-- add img of the enemy pokemon
                             todo: add images of the enemy-->
                            <p id="alliedPokemonImage"><img src="media/PokemonImages/pikachu.png"></p>
                        </div>
                    </div>

                </div>
            </span>
        </div>

        <!--                -->
        <!-- Select attack  -->
        <!--   or switch    -->
        <div class="row" id="select_action">
            <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- Middle text -->
                    <div class="row">
                        <hr>
                        <br>
                        <div class="col-md-12">
                            <p class="text-center Middle-Text">Your turn! what do you want to do?</p>
                        </div>
                        <hr>
                    </div>

                    <!-- Buttons -->
                    <div class="row justify-content-center">
                        <!-- Attack button -->
                        <div class="col-md-3 text-center button-div">
                            <button type="button" class="btn btn-primary" id="AttackButton">
                                <h2 class="ButtonText attacktext">Attack</h2>
                            </button>
                        </div>
                        <!-- Switch button -->
                        <div class="col-md-3 text-center button-div">
                            <button type="button" class="btn btn-primary" id="SwitchButton">
                                <h2 class="ButtonText switchtext">Switch</h2>
                            </button>
                        </div>
                    </div>
                </div>
            </span>
        </div>

        <!--                -->
        <!-- Attack screen  -->
        <!--                -->
        <div class="row" id="attack">
            <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- Middle text -->
                    <div class="row">
                        <hr>
                        <br>
                        <div class="col-md-12">
                            <p class="text-center Middle-Text">Which attack do you want to use?</p>
                        </div>
                        <hr>
                    </div>

                    <!-- Attack buttons -->
                    <div class="row">
                        <!-- attack number 1-->
                        <div class="col-md-4 text-center">
                            <button type="button" class="btn btn-basic electric-type attack-choice-button">
                                <h2 class="ButtonText attacktext">Thunder shock</h2>
                                <h5>PP:</h5>
                                <h5>5/10</h5>
                            </button>
                        </div>

                        <!-- attack number 2-->
                        <div class="col-md-4 text-center">
                            <button type="button" class="btn btn-basic normal-type attack-choice-button">
                                <h2 class="ButtonText attacktext">Slam</h2>
                                <h5>PP:</h5>
                                <h5>5/10</h5>
                            </button>
                        </div>

                        <!-- attack number 3-->
                        <div class="col-md-4 text-center">
                            <button type="button" class="btn btn-basic electric-type attack-choice-button">
                                <h2 class="ButtonText attacktext">Thunderwave</h2>
                                <h5>PP:</h5>
                                <h5>5/10</h5>
                            </button>
                        </div>
                    </div>

                    <!-- Back & Ready buttons -->
                    <div class="row justify-content-center">

                        <!-- Go back to select action screen button -->
                        <div class="col-md-3 text-center button-div return-button">
                            <button type="button" class="btn btn-light">
                                <img src="media/Go-back-arrow.png" style=" height: 100%;
                                    width: 100%">
                            </button>
                        </div>

                        <!--Ready button todo: Id naar cass veranderen!-->
                        <div class="col-md-6 text-center button-div">
                            <button type="button" class="btn btn-danger" id="ReadyPokemonChoice">
                                <h2 class="ReadyButton">Ready</h2>
                            </button>
                        </div>

                    </div>

                </div>
            </span>
        </div>

        <!--                -->
        <!-- Switch Pokemon -->
        <!--                -->
        <div class="row" id="switch_pokemon">
            <span class="border border-dark">
                <div class="col-md-12 main-box">

                    <!-- Middle text -->
                    <div class="row">
                        <hr>
                        <br>
                        <div class="col-md-12">
                            <p class="text-center Middle-Text">To which pokemon do you want to switch?</p>
                        </div>
                        <hr>
                    </div>

                    <!-- Pokemon choices -->
                    <div class="row">

                        <!-- Pokemon choice 1 -->
                        <div class="col-md-6 text-center">
                            <button type="button" class="btn btn-basic grass-type pokemon-switch-button">
                                <h3>Bulbasaur</h3>
                                <img src="media/PokemonImages/bulbasaur.png">
                                <h5>HP:</h5>
                                <div class="progress">
                                    <!--Om de kleur aan te passen kan je de class veranderen naar:
                                Groen: "progress-bar bg-success" (bij 50-100%)
                                Oranje: "progress-bar bg-warning" (bij 25-50%)
                                Rood: "progress-bar bg-danger"  (bij 1-25%)

                                Om de bar aan te passen kan je in style de width veranderen, volgens mij
                                moet je ook de aria-valuenow aanpassen. Als je dit geleidelijk laat veranderen
                                lijkt het erop dat hij langzaam minder wordt
                                -->
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </button>
                        </div>

                        <!-- Pokemon choice 2-->
                        <div class="col-md-6 text-center">
                            <button type="button" class="btn btn-basic fire-type pokemon-switch-button">
                                <h3>Charmander</h3>
                                <img src="media/PokemonImages/charmander.png">
                                <h5>HP:</h5>
                                <div class="progress">
                                    <!--Om de kleur aan te passen kan je de class veranderen naar:
                                Groen: "progress-bar bg-success" (bij 50-100%)
                                Oranje: "progress-bar bg-warning" (bij 25-50%)
                                Rood: "progress-bar bg-danger"  (bij 1-25%)

                                Om de bar aan te passen kan je in style de width veranderen, volgens mij
                                moet je ook de aria-valuenow aanpassen. Als je dit geleidelijk laat veranderen
                                lijkt het erop dat hij langzaam minder wordt
                                -->
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 65%"
                                        aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </button>
                        </div>

                    </div>

                    <!-- Back & Ready buttons -->
                    <div class="row justify-content-center">

                        <!-- Go back to select action screen button -->
                        <div class="col-md-3 text-center button-div return-button">
                            <button type="button" class="btn btn-light">
                                <img src="media/Go-back-arrow.png" style=" height: 100%;
                                    width: 100%">
                            </button>
                        </div>

                        <!--Ready button todo: Id naar cass veranderen!-->
                        <div class="col-md-6 text-center button-div">
                            <button type="button" class="btn btn-danger" id="ReadyPokemonChoice">
                                <h2 class="ReadyButton">Ready</h2>
                            </button>
                        </div>

                    </div>

                </div>
            </span>
        </div>

    </div>

</body>

</html>