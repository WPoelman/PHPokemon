function get(action){
    // shortcut for using api GET
    return $.get(`pokemon_handler.php/${action}`);
}

function post(action, data){
    // shortcut for using api POST
    return $.post(`pokemon_handler.php/${action}`, data);
}

function getPlayerData() {
    // get the current player data
    return get('get_profile');
}

function readyButtonLaunch(selected_pokemon) {

    let username_field = $('#username');
    // Check if the user has selected three pokemon and
    // has entered his username
    if ((selected_pokemon.length !== 3) || (!username_field.val())) {
        alert("Please select three pokemon and enter your username!");
        return;
    }

    // send the post request with the username and selected pokemon
    let reactie = post("start_game",
        {
            "pokemon": selected_pokemon,
            "username": username_field.val()
        });

    // dit is om te testen !! de reactie komt van pokemon_handler.php/game_start
    reactie.done(function (data) {
        console.log('this data was sent to the server:');
        console.log(data);
        // test if it is actually saved to SESSION
        console.log('this data was saved at the server:');
        getPlayerData().then(data => console.log(data))
    });
}

function switchButtonLaunch () {

}

function attackButtonLaunch () {

}

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
        readyButtonLaunch(selected_pokemon);
    });

    // switch pokemon button is clicked
    $('#SwitchButton').click(function () {
        switchButtonLaunch();
    });

    // attack button is clicked
    $('#AttackButton').click(function () {
        attackButtonLaunch();
    });

});
