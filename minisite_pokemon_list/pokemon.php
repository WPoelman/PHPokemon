<?php
/* Header */
$page_title = 'Pokemon list';
$navigation = Array(
    'active' => 'List of Pokemon',
    'items' => Array(
        'Home' => 'index.php',
        'List of Pokemon' => 'pokemon.php'
    )
);
include __DIR__ . '/tpl/head.php';
/* Body */
include __DIR__ . '/tpl/body-start.php';
?>

    <div class="container">

        <div class="row wp-row">
            <div class="col-md-6">
                <div id="Pikachu">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Pikachu</p>
                                <img src="img/pikachu.png" id="pika">
                            </div>
                            <div class="col-md-6">
                                <p id="hp">HP: 45</p>
                                <p id="attack">Attack: 55 </p>
                                <p id="defense">Defense: 30</p>
                                <p id="speed">Speed: 90</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table>
                                    <tr>
                                        <th>Attack name</th>
                                        <th>Power</th>
                                        <th>Accuracy</th>
                                        <th>PP</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr>
                                        <td>Thunder shock</td>
                                        <td>45</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Electric</td>
                                    </tr>
                                    <tr>
                                        <td>Slam</td>
                                        <td>55</td>
                                        <td>95%</td>
                                        <td>20</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td>Thunderbolt</td>
                                        <td>85</td>
                                        <td>70%</td>
                                        <td>10</td>
                                        <td>Electric</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="Pikachu">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Pikachu</p>
                                <img src="img/pikachu.png" id="pika">
                            </div>
                            <div class="col-md-6">
                                <table class="stats">
                                    <tr>
                                        <td><b>Element</b></td>
                                        <td><span class="electric">Electric</span></td>
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
                        <div class="row">
                            <div class="col-md-12">
                                <table class="moveset">
                                    <tr>
                                        <th>Attack name</th>
                                        <th>Power</th>
                                        <th>Accuracy</th>
                                        <th>PP</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr>
                                        <td>Thunder shock</td>
                                        <td>45</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td><span class="electric">Electric</span></td>
                                    </tr>
                                    <tr>
                                        <td>Slam</td>
                                        <td>55</td>
                                        <td>95%</td>
                                        <td>20</td>
                                        <td><span class="normal">Normal</span></td>
                                    </tr>
                                    <tr>
                                        <td>Thunderbolt</td>
                                        <td>85</td>
                                        <td>70%</td>
                                        <td>10</td>
                                        <td><span class="electric">Electric</span></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row wp-row">
            <!-- Vanaf hier pokemon 3 -->
            <div class="col-md-6">
                <div id="Pikachu2">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Pikachu</p>
                                <p id="image"><img src="img/pikachu.png" id="pika"></p>
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
                        <div class="row">
                            <div class="col-md-12">
                                <table class="moveset">
                                    <tr>
                                        <th>Attack name</th>
                                        <th>Power</th>
                                        <th>Accuracy</th>
                                        <th>PP</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr>
                                        <td>Thunder shock</td>
                                        <td>45</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Electric</td>
                                    </tr>
                                    <tr>
                                        <td>Slam</td>
                                        <td>55</td>
                                        <td>95%</td>
                                        <td>20</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td>Thunderbolt</td>
                                        <td>85</td>
                                        <td>70%</td>
                                        <td>10</td>
                                        <td>Electric</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vanaf hier pokemon 4 -->
            <div class="col-md-6">
                <div id="Pikachu">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Pikachu</p>
                                <p id="image"><img src="img/pikachu.png" id="pika_image"></p>
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
                        <div class="row">
                            <div class="col-md-12">
                                <table class="moveset">
                                    <tr>
                                        <th>Attack name</th>
                                        <th>Power</th>
                                        <th>Accuracy</th>
                                        <th>PP</th>
                                        <th>Type</th>
                                    </tr>
                                    <tr>
                                        <td>Thunder shock</td>
                                        <td>45</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Electric</td>
                                    </tr>
                                    <tr>
                                        <td>Slam</td>
                                        <td>55</td>
                                        <td>95%</td>
                                        <td>20</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td>Thunderbolt</td>
                                        <td>85</td>
                                        <td>70%</td>
                                        <td>10</td>
                                        <td>Electric</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php
include __DIR__ . '/tpl/body-end.php';
/* Footer */
include __DIR__ . '/tpl/footer.php';
?>