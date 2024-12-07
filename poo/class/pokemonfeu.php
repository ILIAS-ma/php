<?php
require_once "Pokemon.php";

class PokemonFeu extends Pokemon
{
    public function __construct($name, $type, $hp, $attack, $defense, $image)
    {
        parent::__construct($name, $type, $hp, $attack, $defense, $image);
    }

    public function utiliserAttaqueSpeciale($adversaire)
    {
        echo "{$this->get_name()} utilise Lance-Flammes sur {$adversaire->get_name()} !<br>";
        $degats = 40; 
        $adversaire->recevoirDegats($degats);
        echo "{$adversaire->get_name()} perd {$degats} PV, il reste {$adversaire->get_points_de_vie()} PV.";
    }
}
?>
