//
// Helper functions
//
function error(msg) {
    let err_modal = $('#errormodal');
    err_modal.find('.modal-body').text(msg);
    err_modal.modal()
}

function showError(data) {
    let msg = JSON.parse(data['responseText'])['error'];
    error(msg);
}

function get(action) {
    // shortcut for using api GET
    return $.get(`pokemon_handler.php/${action}`).fail(showError);
}

function post(action, data) {
    // shortcut for using api POST
    return $.post(`pokemon_handler.php/${action}`, data).fail(showError);
}


//
// The send*** functions interact with the server 
//
function sendRoundAction(action, parameter) {
    // let the user send their action for this round
    // e.g.
    // sendRoundAction('attack', 'Thunder shock')
    // sendRoundAction('switch', 'Pikachu')
    return post('do_action', {"action": action, "parameter": parameter});
}

function sendPreGameInfo(username, selected_pokemon) {

    // Check if the user has selected three pokemon and
    // has entered his username, max 30 characters
    if ((selected_pokemon.length !== 3) ||
        (!username) ||
        (username.length > 30)) {
        error("Please select three pokemon and enter your username (max 30 characters)!");
        return;
    }

    // send the post request with the username and selected pokemon
    return post("start_game", {
        "pokemon": selected_pokemon,
        "username": username
    }).then(function (data) {
        data = JSON.parse(data);
        // if the request was good, go to the next screen
        if (!data['error']) {
            // once the 1st round has started, the attack screen will show
            startEventListener();
            waitingScreenLaunch(data);
            return data;

            // for dummy
            // readyButtonLaunch()
        } else {
            error(data['error'])
        }
    });
}


//
// The ***ButtonLaunch functions trigger the different html components
// of the game. 
//
function playButtonLaunch() {
    // switched from the homescreen to the
    // pre game selection screen
    $('#homescreen').hide();
    $('#pre_game_selection_screen').show();
}

function readyButtonLaunch() {
    // change from the pre game selection screen to the
    // waiting screen
    $('#pre_game_selection_screen').hide();
    $('#waiting_screen').hide();

    // get the attacks for the current pokemon
    // updateAttackScreen();

    $('#main_game_screen').show();
    $('#select_action').show();
}

function waitingScreenLaunch(pokemon_data) {
    // change from the selection screen to the
    // waiting screen
    $('#pre_game_selection_screen').hide();
    let i = 1;
    let pokemons = pokemon_data["playerdata"]["pokemon"];
    for (let pokemon in pokemons) {
        let current_element = $('#pokemon-choice-' + i);
        current_element.children().attr('id', pokemon).addClass(pokemons[pokemon]["Element"] + '-type');
        $(`#pokemon-choice-${i} p:nth-child(1)`).text(pokemon);
        $(`#pokemon-choice-${i} img`).attr('src', `media/PokemonImages/${pokemon}.png`);
        i++;
    }
    // Select the third choice and then add all the
    // necessary classes and id's for representation

    $('#waiting_screen').show();
}

function resumeGame() {
    // try to resume game based on 'old' session data on the server
    get('resume_game').then(function (data) {
        data = JSON.parse(data);
        if (data['me']) {
            playButtonLaunch();
            waitingScreenLaunch({'playerdata': data});
            updateGameScreen(data);
            updateAttackSwitchScreen(data);
            readyButtonLaunch();
        }
    })
}

function switchButtonLaunch() {
    // change from the selection screen to the
    // switch pokemon screen
    $('#select_action').hide();
    $('#switch_pokemon').show();
}

function backButtonLaunch() {
    // go back to the selection screen if the active screen is 'switch pokemon'
    let switchscreen = $('#switch_pokemon');
    let attackscreen = $('#attack');
    if (switchscreen.is(':visible')) {
        switchscreen.hide();
    }
    // go back to the selection screen if the active screen is 'attack'
    else if (attackscreen.is(':visible')) {
        attackscreen.hide();
    }

    // show the selection screen again
    $('#select_action').show();
}

function attackButtonLaunch() {
    // change from the selection screen to the
    // attack screen
    $('#select_action').hide();
    $('#attack').show();
}

function winnerScreenLaunch(data) {
    // Change from the main game screen to the
    // game over screen and shows the winner.
    $('#main_game_screen').hide();
    $('#select_action').hide();
    $('#winning-text').text(data['winner']+ " won! \n Want to try again?");
    $('#game_over_screen').show();
}

function roundWaitScreenLaunch(name, action) {
    if (action === 'attack') {
        $('#attack').hide();
    } else {
        $('#switch_pokemon').hide();
    }

    // show the round waiting screen with the chosen action this round
    $('#pokemon_list_waiting_screen').hide();
    $('#action_choice_message').text("Action this round: " + action + " " + name);
    $('#waiting_status_message').text("Waiting for your opponent to choose an action...");
    $('#waiting_screen').show();
}

// update the attack screen to the currently active pokemon attacks
function updateAttackSwitchScreen(data) {
    // get the user info
    let player_data = data['data'][data['me']];
    let active_pokemon = player_data["active_pokemon"];
    let i = 1;
    player_data["pokemon"][active_pokemon]['Moveset'].forEach(move => {
        let current_element = $('#attack_' + i);
        //remove old types
        current_element
            .removeClass(function (index, lst) {
                return lst.split(' ').filter(
                    // split the classlist on spaces, so we can iterate it
                    function (cls) {
                        // select all the classes that end with -type
                        return cls.endsWith('type')
                    }
                )
            })
            .addClass(move["Type"] + '-type');

        // data should be edited with data() instead of attr()
        current_element.data('name', move["Name"]);
        $('#name_' + i).text(move["Name"]);
        $('#pp_' + i).text(move["Current PP"]);
        i++;
    });

    // Switch screen update
    // for each remaining pokemon, show the corresponding info
    i = 1;
    let all_pokemon = player_data["pokemon"];
    for (let pokemon in all_pokemon) {

        // show all choosable pokemon (not currently active)
        if (pokemon !== active_pokemon) {
            let choice_element = $('#choice_' + i);

            // first remove old classes

            choice_element.removeClass(function (index, lst) {
                return lst.split(' ').filter(
                    // split the classlist on spaces, so we can iterate it
                    function (cls) {
                        // select all the classes that end with -type
                        return cls.endsWith('type')
                    }
                )
            })
                .addClass(all_pokemon[pokemon]["Element"] + "-type")
                .data('name', all_pokemon[pokemon]["Name"]);

            $('#choice_' + i + '_img').attr('src', 'media/PokemonImages/' + all_pokemon[pokemon]['Name'] + '.png');
            $('#choice_' + i + '_name').text(all_pokemon[pokemon]["Name"]);

            // update switch pokemon
            let current_hp = Math.round((all_pokemon[pokemon]["Current HP"] / all_pokemon[pokemon]["HP"]) * 100);
            let health_bar = $('#choice_health_' + i);
            updateHealthBarElement(current_hp, health_bar);

            i++;
        }
    }
}

// change the sprites based on the user (enemy <> player)
function updateGameScreenElements(round_data, player_option, status) {
    let state;
    let i = 1;
    let all_pokemon = round_data["data"][player_option]["pokemon"];
    let active_pokemon = all_pokemon[round_data["data"][player_option]["active_pokemon"]]['Name'];
    for (let pokemon in all_pokemon) {
        if (all_pokemon[pokemon]['Current HP'] <= 0) {
            state = 'dead';
        } else {
            state = 'alive';
        }
        $(`#pokemon-${i}-${status}`).attr("src", `media/Pokeball-${state}.png`);

        i++;

        if (active_pokemon !== pokemon) {
            // skip non-active pokemons for this next part
            continue
        }

        // update active pokemon
        let current_hp = Math.round((all_pokemon[pokemon]["Current HP"] / all_pokemon[pokemon]["HP"]) * 100);
        let health_bar = $('#main_health_' + status);

        updateHealthBarElement(current_hp, health_bar);

    }
}

function updateHealthBarElement(current_hp, health_bar) {
    health_bar.attr("aria-valuenow", current_hp);
    health_bar.css("width", current_hp + "%");
    health_bar.removeClass("bg-success bg-warning bg-danger");

    // health is high
    if (current_hp >= 50) {
        health_bar.addClass("bg-success");
        // health is medium
    } else if (25 < current_hp && current_hp < 50) {
        health_bar.addClass("bg-warning");
        // health is low
    } else {
        health_bar.addClass("bg-danger");
    }

}

// update the game screen based on new round data
function updateGameScreen(round_data) {
    let player, enemy;

    player = round_data['me'];
    if (player === 'player1') {
        enemy = "player2";
    } else {
        enemy = "player1";
    }

    // hide the waiting element
    $('#waiting_screen').hide();
    $('#select_action').show();

    // player side updates
    updateGameScreenElements(round_data, player, "ally");
    let mypoke = round_data["data"][player]["active_pokemon"];
    $('#alliedPokemonImage').attr('src', `media/PokemonImages/${mypoke}.png`);

    // enemy side updates
    updateGameScreenElements(round_data, enemy, "enemy");
    let theirpoke = round_data["data"][enemy]["active_pokemon"];
    $('#enemyPokemonImage').attr('src', `media/PokemonImages/${theirpoke}.png`);
}

function updateUsernameElement(data) {
    // show the username above the health bar, only needs to run once (so only round 1)
    let player, enemy;
    player = data['me'];
    if (player === 'player1') {
        enemy = "player2";
    } else {
        enemy = "player1";
    }
    $('#ally_username').text(data["data"][player]['username']);
    $('#enemy_username').text(data["data"][enemy]['username']);
}

// use new data about the round in the user interface
function gamestateHandler(data) {

    if (data['function'] === 'roundchange') {
        // next round
        console.log('data', data['data']);
        if (data['data']['round'] === 1) {
            // first round -> show initial screen
            readyButtonLaunch();
            updateUsernameElement(data);
        }
        updateGameScreen(data);
        updateAttackSwitchScreen(data);
    } else if (data['function'] === 'winner') {
        // somebody won, game is over
        winnerScreenLaunch(data);
        updateGameScreen(data);
        updateAttackSwitchScreen(data);
    }

    // Use updateAttackSwitchScreen() & updateGameScreen() after a round
    console.log(data);
}

// every second, the getGameState function is called (to see if the other player has played yet)
function startEventListener() {
    let gamestate_checker = setInterval(
        () => getGameState(gamestate_checker),
        1000
    )
}

// the get gamestate function checks with the server if the other player has done something this round.
// if this is the case, the client stops checking this and gamestateHandler is called to do something with the new data
function getGameState(interval_id) {
    get('game_info').then(data => {
        if (data) {
            clearInterval(interval_id);  // stop checking after getting data
            data = JSON.parse(data);
            gamestateHandler(data)
        }
    }).fail(() => clearInterval(interval_id))
}


//
// Main
//
$(function () {
    // The user can select three pokemon
    let selected_pokemon = [];
    $('.pokemon_choice').click(function () {

        let current_element = $(this);

        // if the pokemon is already selected, remove it -> toggle selection
        if (current_element.hasClass("selected_pokemon")) {
            current_element.removeClass("selected_pokemon");
            let index = selected_pokemon.indexOf(current_element.find('.name').text());
            if (index > -1) {
                selected_pokemon.splice(index, 1);
            }

            // otherwise add the pokemon
        } else {
            current_element.addClass("selected_pokemon");
            selected_pokemon.push(current_element.find('.name').text());

            // if the selection is more than three, remove the last added and
            // alert the user 
            if (selected_pokemon.length > 3) {
                selected_pokemon.pop();
                current_element.removeClass("selected_pokemon");
                error("Please select only three pokemon!");
            }
        }
    });

    // ready game button is clicked
    $('#ReadyPokemonChoice').click(function () {
        let username = $('#username').val();
        sendPreGameInfo(username, selected_pokemon);
    });

    // play game button is clicked
    $('#PlayButton').click(function () {
        // first try resuming old game:
        playButtonLaunch();
        resumeGame();

    });

    // switch pokemon button is clicked
    $('#SwitchButton').click(switchButtonLaunch);

    $('.BackButton').click(backButtonLaunch);

    // attack button is clicked
    $('#AttackButton').click(attackButtonLaunch);

    // the attack a user clicks on during choosing gets a special class, so we can remember it
    $('.attack-choice-button').click(function () {
        $('.attack-choice-button').removeClass('attack-choice');
        $(this).addClass('attack-choice');
    });

    // the pokemon a user clicks on during switching gets a special class, so we can remember it
    $('.pokemon-switch-button').click(function () {
        $('.pokemon-switch-button').removeClass('switch-choice');
        $(this).addClass('switch-choice');
    });

    // if the user has picked an attack to use (during battle) and clicked the ready button, the data is checked,
    // sent to the server and the screen is closed
    $('#ReadyAttackChoice').click(function () {
        let attack_name = $('.attack-choice').first().data('name');
        if (!attack_name) {
            error('please choose an attack');
        } else {
            sendRoundAction('attack', attack_name).then(() => {
                roundWaitScreenLaunch(attack_name, "attack");
                startEventListener()
            })
        }
    });

    // if the user has picked a pokemon to switch to (during battle) and clicked the ready button, the data is checked,
    // sent to the server and the screen is closed
    $('#ReadySwitchChoice').click(function () {
        let pokemon_name = $('.switch-choice').first().data('name');
        if (!pokemon_name) {
            error('please choose a new pokemon');
        } else {
            sendRoundAction('switch', pokemon_name).then(() => {
                roundWaitScreenLaunch(pokemon_name, "switch");
                startEventListener()
            });
        }
    });

    // close modal when the button is pressed
    $('#errormodal .modal-close').click(() => $('#errormodal').modal('hide'));

});

function dummy(username) {
    // so I don't have to click each time I need to test
    username = username || 'p1';
    return sendPreGameInfo(username, ['Bulbasaur', 'Pikachu', 'Charmander']).then((data) => {
        playButtonLaunch();
        waitingScreenLaunch(data);
        return data;
    })
}