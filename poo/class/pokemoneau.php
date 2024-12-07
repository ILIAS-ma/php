<?php
require_once "Pokemon.php";

class PokemonEau extends Pokemon
{
    public function __construct($name, $type, $hp, $attack, $defense, $image)
    {
        parent::__construct($name, $type, $hp, $attack, $defense, $image);
    }

    public function utiliserAttaqueEau()
    {
        echo "<p>{$this->name} utilise une attaque d'eau !</p>";
    }
}
?>
