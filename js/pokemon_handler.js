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
    // has entered his username
    if ((selected_pokemon.length !== 3) || (!username)) {
        error("Please select three pokemon and enter your username!");
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
        }
        else {
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

    // First selected pokemon


    $('#waiting_screen').show();
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

function updateAttackScreen(data) {
    // get the user info
    let player_data = data['data'][data['me']];
    let active_pokemon = player_data["active_pokemon"];
    let i = 1;
    player_data["pokemon"][active_pokemon]['Moveset'].forEach(move => {
        let current_element = $('#attack_' + i);
        current_element.addClass(move["Type"] + '-type');
        current_element.attr('data-name', move["Name"]);
        $('#name_' + i).text(move["Name"]);
        $('#pp_' + i).text(move["Current PP"]);
        i++;
    });
}

// change the sprites based on the user (enemy <> player)
function updateGameScreenElements(round_data, player_option, status) {
    let state;
    let i = 1;
    for (let pokemon in round_data["data"][player_option]["pokemon"]) {
        if (pokemon['Current HP'] <= 0) {
            state = 'dead';
        } else {
            state = 'alive';
        }
        $(`#pokemon-${i}-${status}`).attr("src", `media/Pokeball-${state}.png`);
        i++;
    }
}

// update the game screen based on new round data
function updateGameScreen(round_data) {
    let player, enemy;

    player = round_data['me'];
    ;
    if (player === 'player1') {
        enemy = "player2";
    } else {
        enemy = "player1";
    }

    // player side updates
    updateGameScreenElements(round_data, player, "ally");
    let mypoke = round_data["data"][player]["active_pokemon"];
    $('#alliedPokemonImage').attr('src', `media/PokemonImages/${mypoke}.png`);

    // enemy side updates
    updateGameScreenElements(round_data, enemy, "enemy");
    let theirpoke = round_data["data"][enemy]["active_pokemon"];
    $('#enemyPokemonImage').attr('src', `media/PokemonImages/${theirpoke}.png`);
}

// to be filled in, use new data about the round in the user interface
function gamestateHandler(data) {

    if (data['function'] === 'roundchange') {
        // next round
        console.log('data', data['data']);
        if (data['data']['round'] === 1) {
            // first round -> show initial screen
            readyButtonLaunch();
        }
        updateGameScreen(data);
        updateAttackScreen(data);
    }

    // hier updateAttackScreen() & updateGameScreen() gebruiken na ronde
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
    $('#PlayButton').click(playButtonLaunch);

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
                backButtonLaunch();
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
                backButtonLaunch();
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