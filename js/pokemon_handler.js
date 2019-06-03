function readyButtonLaunch(selected_pokemon) {

    // Check if the user has selected three pokemon and
    // has entered his username
    if ( (selected_pokemon.length != 3) || (! $('#username').val()) ) {
        alert("Please select three pokemon and enter your username!");
        return;
    }

    // send the post request with the username and selected pokemon
    let reactie = $.post("pokemon_handler.php/start_game", 
    {
        "pokemon"   : selected_pokemon.toString(),
        "username"  : $('#username').val()
    });

    // dit is om te testen !! de reactie komt van pokemon_handler.php/game_start
    reactie.done(function (data) {
        console.log(data);
    })
}

$(function() {
    // The user can select three pokemon
    let selected_pokemon = [];
    $('.pokemon_choice').click(function(){

        current_element = $(this);
        
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
    $('#ReadyPokemonChoice').click(function() {
        readyButtonLaunch(selected_pokemon);
    });

    // switch pokemon button is clicked
    $('#SwitchButton').click(function() {
        switchButtonLaunch();
    });

    // attack button is clicked
    $('#AttackButton').click(function() {
        attackButtonLaunch();
    });

});