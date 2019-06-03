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
            <div class="col-md-12 intro">
                <h1>List of Pokémon</h1>
                <p>Below is an overview of the 12 available Pokémon to choose from.</p>
            </div>
        </div>
        <!-- Fire row -->
        <div class="row wp-row">
            <!-- Pokemon 1 -->
            <div class="col-md-6">
                <div id="Charmander" class="pokemon current">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Charmander</p>
                                <p id="image"><img src="img/charmander.png" class="sprite bouncing"></p>
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
                                        <td><i>Scratch</i></td>
                                        <td>40</td>
                                        <td>100%</td>
                                        <td>35</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Ember</i></td>
                                        <td>40</td>
                                        <td>95%</td>
                                        <td>25</td>
                                        <td>Fire</td>
                                    </tr>
                                    <tr>
                                        <td><i>Slash</i></td>
                                        <td>80</td>
                                        <td>80%</td>
                                        <td>10</td>
                                        <td>Normal</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pokemon 2 -->
            <div class="col-md-6">
                <div id="Vulpix" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Vulpix</p>
                                <p id="image"><img src="img/vulpix.png" class="sprite"></p>
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
                                        <td><i>Quick attack</i></td>
                                        <td>40</td>
                                        <td>100%</td>
                                        <td>35</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Fire spin</i></td>
                                        <td>50</td>
                                        <td>90%</td>
                                        <td>15</td>
                                        <td>Fire</td>
                                    </tr>
                                    <tr>
                                        <td><i>Flamethrower</i></td>
                                        <td>90</td>
                                        <td>70%</td>
                                        <td>5</td>
                                        <td>Fire</td>
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
            <div class="col-md-6">
                <div id="Squirtle" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Squirtle</p>
                                <p id="image"><img src="img/squirtle.png" class="sprite"></p>
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
                                        <td><i>Tackle</i></td>
                                        <td>40</td>
                                        <td>100%</td>
                                        <td>30</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Bubble</i></td>
                                        <td>40</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Water</td>
                                    </tr>
                                    <tr>
                                        <td><i>Water pulse</i></td>
                                        <td>75</td>
                                        <td>90%</td>
                                        <td>10</td>
                                        <td>Water</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pokemon 4 -->
            <div class="col-md-6">
                <div id="Staryu" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Staryu</p>
                                <p id="image"><img src="img/staryu.png" class="sprite"></p>
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
                                        <td><i>Swift</i></td>
                                        <td>60</td>
                                        <td>90%</td>
                                        <td>20</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Bubble beam</i></td>
                                        <td>65</td>
                                        <td>90%</td>
                                        <td>10</td>
                                        <td>Water</td>
                                    </tr>
                                    <tr>
                                        <td><i>Hydro pump</i></td>
                                        <td>100</td>
                                        <td>60%</td>
                                        <td>7</td>
                                        <td>Water</td>
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
            <div class="col-md-6">
                <div id="Bulbasaur" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Bulbasaur</p>
                                <p id="image"><img src="img/bulbasaur.png" class="sprite" id="bulba"></p>
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
                                        <td><i>Tackle</i></td>
                                        <td>40</td>
                                        <td>100%</td>
                                        <td>30</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Vine whip</i></td>
                                        <td>45</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Grass</td>
                                    </tr>
                                    <tr>
                                        <td><i>Take down</i></td>
                                        <td>90</td>
                                        <td>75%</td>
                                        <td>5</td>
                                        <td>Normal</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pokemon 6 -->
            <div class="col-md-6">
                <div id="Oddish" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Oddish</p>
                                <p id="image"><img src="img/oddish.png" class="sprite"></p>
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
                                        <td><i>Headbutt</i></td>
                                        <td>50</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Razor leaf</i></td>
                                        <td>65</td>
                                        <td>85%</td>
                                        <td>15</td>
                                        <td>Grass</td>
                                    </tr>
                                    <tr>
                                        <td><i>Petal dance</i></td>
                                        <td>75</td>
                                        <td>80%</td>
                                        <td>15</td>
                                        <td>Grass</td>
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
            <div class="col-md-6">
                <div id="Pikachu" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Pikachu</p>
                                <p id="image"><img src="img/pikachu.png" class="sprite"></p>
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
                                        <td><i>Thunder shock</i></td>
                                        <td>45</td>
                                        <td>100%</td>
                                        <td>25</td>
                                        <td>Electric</td>
                                    </tr>
                                    <tr>
                                        <td><i>Slam</i></td>
                                        <td>55</td>
                                        <td>95%</td>
                                        <td>20</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Thunderbolt</i></td>
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

            <!-- Pokemon 8 -->
            <div class="col-md-6">
                <div id="Magnemite" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Magnemite</p>
                                <p id="image"><img src="img/magnemite.png" class="sprite"></p>
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
                                        <td><i>Sonic boom</i></td>
                                        <td>45</td>
                                        <td>95%</td>
                                        <td>25</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Thunder wave</i></td>
                                        <td>50</td>
                                        <td>90%</td>
                                        <td>25</td>
                                        <td>Electric</td>
                                    </tr>
                                    <tr>
                                        <td><i>Flash canon</i></td>
                                        <td>100</td>
                                        <td>50%</td>
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
        <!-- End of electric pokemon row -->

        <!-- Normal row -->
        <div class="row wp-row">
            <!-- Pokemon 9 -->
            <div class="col-md-6">
                <div id="Rattata" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Rattata</p>
                                <p id="image"><img src="img/rattata.png" class="sprite"></p>
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
                                        <td><i>Tackle</i></td>
                                        <td>40</td>
                                        <td>100%</td>
                                        <td>30</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Crunch</i></td>
                                        <td>50</td>
                                        <td>95%</td>
                                        <td>25</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Double edge</i></td>
                                        <td>85</td>
                                        <td>65%</td>
                                        <td>15</td>
                                        <td>Normal</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pokemon 10 -->
            <div class="col-md-6">
                <div id="Eevee" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Eevee</p>
                                <p id="image"><img src="img/eevee.png" class="sprite"></p>
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
                                        <td><i>Bite</i></td>
                                        <td>60</td>
                                        <td>95%</td>
                                        <td>25</td>
                                        <td>Normal</td>
                                    </tr>
                                    <tr>
                                        <td><i>Water canon</i></td>
                                        <td>65</td>
                                        <td>90%</td>
                                        <td>20</td>
                                        <td>Water</td>
                                    </tr>
                                    <tr>
                                        <td><i>Flare</i></td>
                                        <td>65</td>
                                        <td>90%</td>
                                        <td>20</td>
                                        <td>Fire</td>
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
                <div id="Geodude" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Geodude</p>
                                <p id="image"><img src="img/geodude.png" class="sprite"></p>
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
                                        <td><i>Rock smash</i></td>
                                        <td>45</td>
                                        <td>95%</td>
                                        <td>25</td>
                                        <td>Rock</td>
                                    </tr>
                                    <tr>
                                        <td><i>Brick break</i></td>
                                        <td>75</td>
                                        <td>70%</td>
                                        <td>25</td>
                                        <td>Rock</td>
                                    </tr>
                                    <tr>
                                        <td><i>Rock slide</i></td>
                                        <td>85</td>
                                        <td>60%</td>
                                        <td>10</td>
                                        <td>Rock</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pokemon 12 -->
            <div class="col-md-6">
                <div id="Omanyte" class="pokemon">
                    <div id="extra-border">
                        <div class="row">
                            <div class="col-md-6">
                                <p id="name">Omanyte</p>
                                <p id="image"><img src="img/omanyte.png" class="sprite"></p>
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
                                        <td><i>Stealth rock</i></td>
                                        <td>50</td>
                                        <td>95%</td>
                                        <td>25</td>
                                        <td>Rock</td>
                                    </tr>
                                    <tr>
                                        <td><i>Water beam</i></td>
                                        <td>50</td>
                                        <td>90%</td>
                                        <td>20</td>
                                        <td>Water</td>
                                    </tr>
                                    <tr>
                                        <td><i>Earthquake</i></td>
                                        <td>70</td>
                                        <td>90%</td>
                                        <td>10</td>
                                        <td>Rock</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of rock pokemon row -->
    </div>


<?php
include __DIR__ . '/tpl/body-end.php';
/* Footer */
include __DIR__ . '/tpl/footer.php';
?>