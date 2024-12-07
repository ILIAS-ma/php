<?php
require_once "Pokemon.php";

class Combat
{
    private $pokemon1;
    private $pokemon2;

    public function __construct($pokemon1, $pokemon2)
    {
        $this->pokemon1 = $pokemon1;
        $this->pokemon2 = $pokemon2;
    }

    public function demarrerCombat()
    {
        echo "<h2>Combat entre {$this->pokemon1->get_name()} et {$this->pokemon2->get_name()}</h2>";

        while (!$this->pokemon1->estKO() && !$this->pokemon2->estKO()) {
            $this->tourDeCombat($this->pokemon1, $this->pokemon2);

            if ($this->pokemon2->estKO()) {
                echo "<p>{$this->pokemon2->get_name()} est KO ! {$this->pokemon1->get_name()} gagne !</p>";
                break;
            }

            $this->tourDeCombat($this->pokemon2, $this->pokemon1);

            if ($this->pokemon1->estKO()) {
                echo "<p>{$this->pokemon1->get_name()} est KO ! {$this->pokemon2->get_name()} gagne !</p>";
                break;
            }
        }
    }

    public function tourDeCombat($attaquant, $defenseur)
    {
        echo "<p>{$attaquant->get_name()} attaque {$defenseur->get_name()} avec une puissance de {$attaquant->get_attack()}</p>";
        $defenseur->recevoirDegats($attaquant->get_attack());
        echo "<p>{$defenseur->get_name()} a maintenant {$defenseur->get_points_de_vie()} points de vie restants.</p>";
    }
}
?>
