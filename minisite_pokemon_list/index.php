<?php
/* Header */
$page_title = 'Home';
$navigation = Array(
    'active' => 'Home',
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
            <div class="col-md-12">
                <h1>Welcome to the homepage!</h1>
                <h3>Here is a bouncing Pikachu:</h3>
                <br />
                <p id="pika_container">
                    <img src="../media/PokemonImages/pikachu.png" id="pika">
                </p>

            </div>
        </div>
    </div>

<?php
include __DIR__ . '/tpl/body-end.php';
/* Footer */
include __DIR__ . '/tpl/footer.php';
?>