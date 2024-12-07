<?php
require_once "class/PokemonFeu.php";
require_once "class/PokemonEau.php";
require_once "class/PokemonPlante.php";
require_once "class/Combat.php";

$pokemons = [
    "Reptincel" => new PokemonFeu("Reptincel", "Feu", 100, 30, 10, "https://th.bing.com/th?id=OIP.PbCKllAh7lvchru4qqOd_wHaHa&w=250&h=250&c=8&rs=1&qlt=90&o=6&dpr=1.1&pid=3.1&rm=2"),
    "Feunard" => new PokemonFeu("Feunard", "Feu", 90, 20, 12, "https://th.bing.com/th?id=OIP.euylJHnoXnyOHeiU8WAqYAHaHI&w=254&h=245&c=8&rs=1&qlt=90&o=6&dpr=1.1&pid=3.1&rm=2"),
    "Goupix" => new PokemonFeu("Goupix", "Feu", 100, 25, 15, "https://th.bing.com/th/id/OIP.4GkG_S8IUTwU900hr6zCGwHaGj?w=211&h=187&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Limagma" => new PokemonEau("Limagma", "Eau", 90, 20, 12, "https://th.bing.com/th/id/OIP.p0odw0EPh3T2XpmgEf0BugHaHa?w=162&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Carabaffe" => new PokemonEau("Carabaffe", "Eau", 90, 20, 12, "https://th.bing.com/th/id/OIP.pXUYq6hgvvFhis1leZIWMgAAAA?w=171&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Akwakwak" => new PokemonEau("Akwakwak", "Eau", 90, 20, 12, "https://th.bing.com/th/id/OIP.zrOc9isg3J_iVJ7olXwGhAAAAA?w=167&h=173&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Paras" => new PokemonPlante("Paras", "Plante", 90, 20, 12, "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/num/046.png"),
    "Empiflor" => new PokemonPlante("Empiflor", "Plante", 90, 20, 12, "https://th.bing.com/th/id/OIP.iNfN-9eQIOEd22HXWvjk9AHaGR?w=200&h=180&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
    "Saquedeneu" => new PokemonPlante("Saquedeneu", "Plante", 90, 20, 12, "https://th.bing.com/th/id/OIP.SGb9G4s5uU_18RuWMvPviAHaHa?pid=ImgDet&w=206&h=206&c=7&dpr=1,1"),
    "Chétiflor" => new PokemonPlante("Chétiflor", "Plante", 90, 20, 12, "https://th.bing.com/th/id/OIP.yVEdztJyFxvucW710wB-sAHaIq?w=200&h=234&c=7&r=0&o=5&dpr=1.1&pid=1.7"),
];



$combatResult = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['pokemon1'], $_POST['pokemon2'])) {
        $pokemon1 = $_POST['pokemon1'];
        $pokemon2 = $_POST['pokemon2'];

        if ($pokemon1 && $pokemon2 && $pokemon1 !== $pokemon2) {
            $combat = new Combat($pokemons[$pokemon1], $pokemons[$pokemon2]);
            ob_start();
            $combat->demarrerCombat();
            $combatResult = ob_get_clean();
        } else {
            $combatResult = "Erreur : Veuillez choisir deux Pokémon valides et différents.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Jeu Pokémon - Combat</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <header>
        <h1>Jeu Pokémon - Choisissez vos Pokémon pour le combat</h1>
    </header>
    
    <section>
        <form method="POST">
            <input type="hidden" name="pokemon1" id="pokemon1">
            <input type="hidden" name="pokemon2" id="pokemon2">
            <h2>Choisissez vos Pokémon en cliquant sur leur image</h2>
            <div class="pokemon-images">
                <?php foreach ($pokemons as $nom => $pokemon): ?>
                    <div class="pokemon-card" onclick="selectPokemon('<?php echo $nom; ?>', this)" data-pokemon="<?php echo $nom; ?>">
                        <img src="<?php echo $pokemon->get_image(); ?>" alt="<?php echo $pokemon->get_name(); ?>">
                        <p><?php echo $nom; ?> (<?php echo $pokemon->get_type(); ?>)</p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div>
                <button type="submit">Démarrer le Combat</button>
            </div>
        </form>
    </section>

    <section>
        <h2>Résultat du Combat</h2>
        <div>
            <?php echo nl2br($combatResult) ?: "<p>Aucun combat encore effectué.</p>"; ?>
        </div>
    </section>
<script src="./select.js"></script>
</body>
</html>
