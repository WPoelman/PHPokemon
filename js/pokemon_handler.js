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
    return post('do_action', {"action": action, "parameter": parameter});
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
            waiting_screen_launch();

            // for dummy
            // readyButtonLaunch()
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
    $('#waiting_screen').hide();
    $('#main_game_screen').show();
    $('#select_action').show();
}

function waiting_screen_launch() {
    // change from the selection screen to the
    // waiting screen
    $('#pre_game_selection_screen').hide();
    get("get_profile").then(function(data){

    });
    //Select the third choice and then add all the
    //necessary classes and id's for representation

    //First selected pokemon
    $('#pokemon-choice-1').children().attr('id', 'Bulbasaur').addClass("fire-type");
    $('#pokemon-choice-1 p:nth-child(1)').text("Charmander");
    $('#pokemon-choice-1 img').attr('src' , 'media/PokemonImages/charmander.png');

    //Second selected Pokémon
    $('#pokemon-choice-2').children().attr('id', 'Charmander').addClass("fire-type");
    $('#pokemon-choice-2 p:nth-child(1)').text("Charmander");
    $('#pokemon-choice-2 img').attr('src' , 'media/PokemonImages/charmander.png');

    //Third selected Pokémon
    $('#pokemon-choice-3').children().attr('id', 'Charmander').addClass("fire-type");
    $('#pokemon-choice-3 p:nth-child(1)').text("Charmander");
    $('#pokemon-choice-3 img').attr('src' , 'media/PokemonImages/charmander.png');

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

function gamestate_handle(data) {

    if (data['function'] === 'roundchange') {
        // next round
        console.log('data', data['data'])
        if (data['data']['round'] === 1) {
            // first round -> show initial screen
            readyButtonLaunch();
        }
    }
    console.log(data);
}

function get_gamestate(interval_id) {
    get('game_info').then(data => {
        console.log('++');
        // todo: stop in het geval van error
        if (data) {
            clearInterval(interval_id);  // stop checking after getting data
            data = JSON.parse(data);
            gamestate_handle(data)
        }
    })
}

function start_event_listener() {
    let gamestate_checker = setInterval(
        () => get_gamestate(gamestate_checker),
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

    $('.attack-choice-button').click(function () {
        $('.attack-choice-button').removeClass('attack-choice');
        $(this).addClass('attack-choice');
    });

    $('.pokemon-switch-button').click(function () {
        $('.pokemon-switch-button').removeClass('switch-choice');
        $(this).addClass('switch-choice');
    });

    $('#ReadyAttackChoice').click(function () {
        let attack_name = $('.attack-choice').first().data('name');
        if (!attack_name) {
            alert('please choose an attack');
        } else {
            sendRoundAction('attack', attack_name);
            backButtonLaunch();
            start_event_listener()
        }
    });

    $('#ReadySwitchChoice').click(function () {
        let pokemon_name = $('.switch-choice').first().data('name');
        if (!pokemon_name) {
            alert('please choose a new pokemon');
        } else {
            sendRoundAction('switch', pokemon_name).then(console.info);
            backButtonLaunch();
            start_event_listener()
        }
    });

});
