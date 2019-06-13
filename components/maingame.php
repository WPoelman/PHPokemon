<!--                  -->
<!-- Main game screen -->
<!--                  -->
<div class="row component" id="main_game_screen">
    <span class="border border-white">
        <div class="col-md-12 main-box">

            <!-- Enemy side -->
            <div class="row enemy flex-row-reverse">
                <div class="col-md-3">
                    <p id="enemy_username"></p>
                    <p>HP:</p>
                    <div class="progress">
                        <!--To change the color, you can change the class to:
                                Green: "progress-bar bg-success" (at 50-100%)
                                Orange: "progress-bar bg-warning" (at 25-50%)
                                Red: "progress-bar bg-danger"  (at 1-25%)

                                To change the health bar, you can change the width. But it seems you also have to
                                change the aria-valuenow. If you make this gradually change, it will seem
                                to decrease slowly.
                                -->
                        <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                            id="main_health_enemy"></div>
                    </div>
                    <p>Pokemon left:</p>
                    <div class="row">
                        <div class="col-md-1">
                            <img class="pokeball" id="pokemon-1-enemy">
                        </div>
                        <div class="col-md-1">
                            <img class="pokeball" id="pokemon-2-enemy">
                        </div>
                        <div class="col-md-1">
                            <img class="pokeball" id="pokemon-3-enemy">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <p class="image"><img id="enemyPokemonImage"></p>
                </div>
            </div>

            <!-- Allied side -->
            <div class="row allied top-buffer">
                <div class="col-md-3 ">
                    <p id="ally_username"></p>
                    <p>HP:</p>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                            id="main_health_ally"></div>
                    </div>
                    <p>Pokemon left:</p>
                    <div class="row">
                        <div class="col-md-1">
                            <img class="pokeball" id="pokemon-1-ally">
                        </div>
                        <div class="col-md-1">
                            <img class="pokeball" id="pokemon-2-ally">
                        </div>
                        <div class="col-md-1">
                            <img class="pokeball" id="pokemon-3-ally">
                        </div>
                    </div>
                </div>

                <div class="col-md-2">
                    <p class="image"><img id="alliedPokemonImage"></p>
                </div>
            </div>

            <!--                -->
            <!-- Select attack  -->
            <!--   or switch    -->
            <div class="col-md-12 main-box component" id="select_action">

                <!-- Middle text -->
                <div class="row">
                    <hr>
                    <br>
                    <div class="col-md-12">
                        <p class="text-center Middle-Text">Your turn! What do you want to do?</p>
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

            <!--                -->
            <!-- Attack screen  -->
            <!--                -->
            <div class="col-md-12 main-box component" id="attack">

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
                        <button type="button" class="btn btn-basic attack-choice-button" id="attack_1">
                            <h2 class="ButtonText attacktext" id="name_1"></h2>
                            <h5>PP:</h5>
                            <h5 id="pp_1"></h5>
                        </button>
                    </div>

                    <!-- attack number 2-->
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-basic attack-choice-button" id="attack_2">
                            <h2 class="ButtonText attacktext" id="name_2"></h2>
                            <h5>PP:</h5>
                            <h5 id="pp_2"></h5>
                        </button>
                    </div>

                    <!-- attack number 3-->
                    <div class="col-md-4 text-center">
                        <button type="button" class="btn btn-basic attack-choice-button" id="attack_3">
                            <h2 class="ButtonText attacktext" id="name_3"></h2>
                            <h5>PP:</h5>
                            <h5 id="pp_3"></h5>
                        </button>
                    </div>
                </div>

                <!-- Back & Ready buttons -->
                <div class="row justify-content-center">

                    <!-- Go back to select action screen button -->
                    <div class="col-md-5 text-center button-div return-button">
                        <button type="button" class="btn btn-light BackButton">
                            <img src="media/Go-back-arrow.png" style=" height: 100%; width: 100%">
                        </button>
                    </div>

                    <!--Ready button -->
                    <div class="col-md-5 text-center button-div">
                        <button type="button" class="btn btn-danger" id="ReadyAttackChoice">
                            <h2 class="ReadyButton">Ready</h2>
                        </button>
                    </div>

                </div>

            </div>

            <!--             -->
            <!-- Action text -->
            <!--             -->
            <div class="col-md-12 main-box component" id="action_text">

                <!-- Middle text -->
                <div class="row">
                    <hr>
                    <br>
                    <div class="col-md-12">
                        <p class="text-center Middle-Text" id="actual_action_text"></p>
                        <p class="text-center Middle-Text" id="description_action_text"></p>
                    </div>
                    <hr>
                </div>
            </div>
            <!--                -->
            <!-- Switch Pokemon -->
            <!--                -->
            <div class="col-md-12 main-box component" id="switch_pokemon">

                <!-- Middle text -->
                <div class="row">
                    <hr>
                    <br>
                    <div class="col-md-12">
                        <p class="text-center Middle-Text">To which Pokémon do you want to switch?</p>
                    </div>
                    <hr>
                </div>

                <!-- Pokemon choices -->
                <div class="row">

                    <!-- Pokemon choice 1 -->
                    <div class="col-md-6 text-center">
                        <button type="button" class="btn btn-basic pokemon-switch-button" id="choice_1">
                            <h3 id="choice_1_name"></h3>
                            <img id="choice_1_img">
                            <h5>HP:</h5>
                            <div class="progress">
                                <!--To change the color, you can change the class to:
                                Green: "progress-bar bg-success" (at 50-100%)
                                Orange: "progress-bar bg-warning" (at 25-50%)
                                Red: "progress-bar bg-danger"  (at 1-25%)

                                To change the health bar, you can change the width. But it seems you also have to
                                change the aria-valuenow. If you make this gradually change, it will seem
                                to decrease slowly.
                                -->
                                <div id="choice_health_1" class="progress-bar" role="progressbar" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </button>
                    </div>

                    <!-- Pokemon choice 2-->
                    <div class="col-md-6 text-center">
                        <button type="button" class="btn btn-basic pokemon-switch-button" id="choice_2">
                            <h3 id="choice_2_name"></h3>
                            <img id="choice_2_img">
                            <h5>HP:</h5>
                            <div class="progress">
                                <!--To change the color, you can change the class to:
                                Green: "progress-bar bg-success" (at 50-100%)
                                Orange: "progress-bar bg-warning" (at 25-50%)
                                Red: "progress-bar bg-danger"  (at 1-25%)

                                To change the health bar, you can change the width. But it seems you also have to
                                change the aria-valuenow. If you make this gradually change, it will seem
                                to decrease slowly.
                                -->
                                <div id="choice_health_2" class="progress-bar " role="progressbar" aria-valuemin="0"
                                    aria-valuemax="100"></div>
                            </div>
                        </button>
                    </div>

                </div>

                <!-- Back & Ready buttons -->
                <div class="row justify-content-center">

                    <!-- Go back to select action screen button -->
                    <div class="col-md-5 text-center button-div return-button">
                        <button type="button" class="btn btn-light BackButton">
                            <img src="media/Go-back-arrow.png" style=" height: 100%; width: 100%">
                        </button>
                    </div>

                    <!--Ready button -->
                    <div class="col-md-5 text-center button-div">
                        <button type="button" class="btn btn-danger" id="ReadySwitchChoice">
                            <h2 class="ReadyButton">Ready</h2>
                        </button>
                    </div>

                </div>

            </div>

        </div>
    </span>
</div>