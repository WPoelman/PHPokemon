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
    <script src="js/pokemonlist.js" type="application/javascript"></script>

    <!-- Own CSS -->
    <link rel="stylesheet" href="css/instructions.css">
    <link rel="shortcut icon" href="media/favicon.ico" type="image/x-icon">

    <title><?= $page_title ?></title>
</head>

<body>

<!-- Menu -->
<?= $navigation ?>

<!-- Container -->
<div class="container">
    <div class="row wp-row">
        <div class="col-md-12 intro">
            <h1>Instructions</h1>
            <p>Below you can read all about the game and how to play it.</p>
        </div>
    </div>

    <div class="row wp-row">
        <div class="col-md-12">
            <h3>About PHPokemon</h3>
            <p>
                PHPokemon is a simplied version of the Pokemon battle-system, that you might know from the many handheld
                Pokemon games like Pokemon Red/Green/Yellow, Silver/Gold, Ruby/Sapphire/Emerald and later Pokemon games.
            </p>
            <p>
                Just as in the normal Pokemon battles, both players have a team of Pokemon and will fight rounds untill
                one player runs out of Pokemon. <br />
                Our version has a lot of the elements from the actual Pokemon games, but there are some changes:
            </p>
            <ul>
                <li>There are only 12 Pokemon to choose from.</li>
                <li>Each player can only choose 3 Pokemon.</li>
                <li>Players will only have the options to attack or switch.</li>
                <li>There are only 6 elements in the game. For an overview, see the <b>Element table</b> below.</li>
                <li>Each Pokemon has a moveset of 3 attacks. Status effects are not included.</li>
            </ul>
        </div>
    </div>

    <div class="row wp-row">
        <div class="col-md-12">
            <h3>How to play</h3>
            <p>
                The game will be played in the following order:
            </p>
            <ol>
                <li>Choosing your Pokemon.</li>
                <li>
                    Playing a round:
                    <ul>
                        <li>attacking</li>
                        <li>switching</li>
                    </ul>
                </li>
                <li>Repeating untill someone is out of Pokemon.</li>
            </ol>
            <h4 class="extra_space">1. Choosing your Pokemon:</h4>
            <p>
                After clicking the play button, you will be directed to the first screen.<br />
                On this screen you have to fill in your username and select the three Pokemon, that you are going
                to use to battle your opponent. The first Pokemon that you choose, is the Pokemon with which you will
                begin the battle. <br />
                Since each Pokemon has different stats, as well as a different element and different attacks, it is
                recommended to first study the <b>Pokemon page</b> and the <b>Element table</b> below. This way you
                will learn the strengths and weaknesses of each Pokemon and use this information to decide how you
                are going to play. <br />
            </p>
            <p>
                When you have entered a username and selected your three Pokemon, you can press the <i>Ready</i> button
                and you will be send to the waiting screen. When a second player has picked his team and clicked
                the <i>Ready</i> button as well, the game will begin automatically.
            </p>
            <h4 class="extra_space">2. Playing a round:</h4>
            <p>
                Now the game has started, both players will see two options: attack or switch. <br />
            </p>

            <h5>Attacking</h5>
            <p>
                When clicking the attack button, the player will see 3 different attacks. <br />
                Each attack has it's own statistics:
            </p>
            <ul>
                <li><b>PP:</b> how many times an attack can be used;</li>
                <li><b>Power:</b> more Power means more damage;</li>
                <li><b>Accuracy</b>: the chance that an attack wil hit the opponent; and</li>
                <li><b>Type</b>: the element of the attack, to determine whether is effective or not against
                    the opponent.</li>
            </ul>
            <p>
                The attacks with more Power often have less Accuracy and also less PP, so they can't be used too many
                times. <br />
                Furthermore, the Pokemon with the highest Speed gets to attack first. If two Pokemon have the same
                Speed, the attacking order will be decided by chance.
            </p>
            <p>
                Reading about the different attacks on the <b>Pokemon page</b> can greatly improve your
                battling strategies.
            </p>

            <h5>Switching</h5>
            <p>
                When you have entered a username and selected your three Pokemon, you can press the <i>Ready</i> button
                and you will be send to the waiting screen. When a second player has picked his team and clicked
                the <i>Ready</i> button as well, the game will begin automatically.
            </p>
            <h4 class="extra_space">3. Repeating:</h4>
        </div>
    </div>

    <div class="row wp-row">
        <div class="col-md-12">
            <h3>Element table</h3>
            <p>
                Each Pokemon has a certain element. On top of this, the different attack al have their own element
                as well. This table shows the six possible elements, as well as their strengths and weaknesses.
            </p>
            <table>
                <tr>
                    <th>Element</th>
                    <th>Strong against</th>
                    <th>Weak against</th>
                </tr>
                <tr>
                    <td>Normal</td>
                    <td>-</td>
                    <td>-</td>
                </tr>
                <tr>
                    <td class="fire">Fire</td>
                    <td>Grass</td>
                    <td>Water, Rock</td>
                </tr>
                <tr>
                    <td class="water">Water</td>
                    <td>Grass</td>
                    <td>Water, Rock</td>
                </tr>
                <tr>
                    <td class="grass">Grass</td>
                    <td>Water, Rock</td>
                    <td>Fire</td>
                </tr>
                <tr>
                    <td class="rock">Rock</td>
                    <td>Fire, Electric</td>
                    <td>Water, Grass</td>
                </tr>
                <tr id="table_end">
                    <td class="electric">Electric</td>
                    <td>Water</td>
                    <td>Rock</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</body>
</html>