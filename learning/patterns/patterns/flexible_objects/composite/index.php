<?php
spl_autoload_register(function ($class) {
    require_once "classes/$class.php";
});

$mainArmy = new Army();
$mainArmy->addUnit(new Archer());
$mainArmy->addUnit(new LaserCannonUnit());

$subArmy = new Army();
$subArmy->addUnit(new Archer());
$subArmy->addUnit(new Archer());
$subArmy->addUnit(new Archer());


$mainArmy->addUnit($subArmy);
print 'Aтакующая сила: ' . $mainArmy->bombardStrength();
print '-------------------------------' . PHP_EOL;


class UnitScript {
    private $comp;

    public static function joinExisting(Unit $newUnit, Unit $occupyingUnit) {
        if (!is_null($comp = $occupyingUnit->getComposite())) {
            $comp->addUnit($newUnit);
        } else {
            $comp = new Army();
            $comp->addUnit($occupyingUnit);
            $comp->addUnit($newUnit);
        }
        return $comp;
    }

}