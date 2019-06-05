//
// Helper functions
//
function showError(data) {
    console.error('REQUEST FAILED:', JSON.parse(data['responseText'])['error'])
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
    post('do_action', {"action": action, "parameter": parameter}).then(console.log);
}

function sendPreGameInfo(username, selected_pokemon) {

    // Check if the user has selected three pokemon and
    // has entered his username
    if ((selected_pokemon.length !== 3) || (!username)) {
        alert("Please select three pokemon and enter your username!");
        return;
    }

    // send the post request with the username and selected pokemon
    let reactie = post("start_game",
        {
            "pokemon": selected_pokemon,
            "username": username
        });

    // dit is om te testen !! de reactie komt van pokemon_handler.php/game_start
    reactie.done(function (data) {
        data = JSON.parse(data);
        // if the request was good, go to the next screen
        if (!data['error']) {
            // once the 1st round has started, the attack screen will show
            start_event_listener();
        }
        else {
            alert(data['error'])
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
    // change from the homescreen to the
    // pre game selection screen
    $('#pre_game_selection_screen').hide();
    $('#main_game_screen').show();
    $('#select_action').show();
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

function gamestate_handle(data) {

    if (data['function'] === 'roundchange') {
        // next round
        if (data['data']['round'] === 1) {
            // first round -> show initial screen
            readyButtonLaunch();
        }
    }
    console.log(data);
}

function get_gamestate() {
    get('game_info').then(data => {
        if (data) {
            data = JSON.parse(data);
            gamestate_handle(data)
        }
    })
}

function start_event_listener() {
    setInterval(
        get_gamestate,
        1000
    )
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
                alert("Please select only three pokemon!");
            }
        }
    });

    // ready game button is clicked
    $('#ReadyPokemonChoice').click(function () {
        sendPreGameInfo(selected_pokemon);
    });

    // play game button is clicked
    $('#PlayButton').click(function () {
        playButtonLaunch();
    });

    // switch pokemon button is clicked
    $('#SwitchButton').click(function () {
        switchButtonLaunch();
    });

    $('.BackButton').click(function () {
        backButtonLaunch();
    })

    // attack button is clicked
    $('#AttackButton').click(function () {
        attackButtonLaunch();
    });

});
