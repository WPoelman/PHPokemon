<!--                  -->
<!-- Main game screen -->
<!--                  -->
<div class="row component" id="main_game_screen">
            <span class="border border-white">
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
                            <p>HP:</p>
                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 25%"
                                     aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
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
                                <button type="button" class="btn btn-basic attack-choice-button"
                                        id="attack_1">
                                    <h2 class="ButtonText attacktext" id="name_1"></h2>
                                    <h5>PP:</h5>
                                    <h5 id="pp_1"></h5>
                                </button>
                            </div>

	                        <!-- attack number 2-->
                            <div class="col-md-4 text-center">
                                <button type="button" class="btn btn-basic attack-choice-button"
                                        id="attack_2">
                                    <h2 class="ButtonText attacktext" id="name_2"></h2>
                                    <h5>PP:</h5>
                                    <h5 id="pp_2"></h5>
                                </button>
                            </div>

	                        <!-- attack number 3-->
                            <div class="col-md-4 text-center">
                                <button type="button" class="btn btn-basic attack-choice-button"
                                        id="attack_3">
                                    <h2 class="ButtonText attacktext" id="name_3"></h2>
                                    <h5>PP:</h5>
                                    <h5 id="pp_3"></h5>
                                </button>
                            </div>
                        </div>

	                    <!-- Back & Ready buttons -->
                        <div class="row justify-content-center">

                            <!-- Go back to select action screen button -->
                            <div class="col-md-3 text-center button-div return-button">
                                <button type="button" class="btn btn-light BackButton">
                                    <img src="media/Go-back-arrow.png" style=" height: 100%; width: 100%">
                                </button>
                            </div>

	                        <!--Ready button todo: Id naar class veranderen!-->
                            <div class="col-md-6 text-center button-div">
                                <button type="button" class="btn btn-danger" id="ReadyAttackChoice">
                                    <h2 class="ReadyButton">Ready</h2>
                                </button>
                            </div>

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
                                <p class="text-center Middle-Text">To which pokemon do you want to switch?</p>
                            </div>
                            <hr>
                        </div>

	                    <!-- Pokemon choices -->
                        <div class="row">

                            <!-- Pokemon choice 1 -->
                            <div class="col-md-6 text-center">
                                <button type="button" class="btn btn-basic Grass-type pokemon-switch-button"
                                        data-name="Bulbasaur">
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
                                <button type="button" class="btn btn-basic Fire-type pokemon-switch-button"
                                        data-name="Charmander">
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
                                <button type="button" class="btn btn-light BackButton">
                                    <img src="media/Go-back-arrow.png" style=" height: 100%; width: 100%">
                                </button>
                            </div>

	                        <!--Ready button todo: Id naar class veranderen!-->
                            <div class="col-md-6 text-center button-div">
                                <button type="button" class="btn btn-danger" id="ReadySwitchChoice">
                                    <h2 class="ReadyButton">Ready</h2>
                                </button>
                            </div>

                        </div>

                    </div>

                </div>
            </span>
</div>