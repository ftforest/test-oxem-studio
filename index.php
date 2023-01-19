<?php

include_once "./functions.php";

class_autoload();

use Classes\Farm;

$farm_1 = new Farm();

$farm_1->pushAnimalCount('Classes\Cow','byrenka',10);
$farm_1->pushAnimalCount('Classes\Chicken','kloka',20);
$farm_1->getAnimals();

$farm_1->getCountAnimalsType();
$farm_1->collectionProductsDay(7);
$farm_1->getProducts();

$farm_1->pushAnimalCount('Classes\Cow','zoya');
$farm_1->pushAnimalCount('Classes\Chicken','kydahi',5);
$farm_1->getCountAnimalsType();

$farm_1->collectionProductsDay(7);
$farm_1->getProducts();
//$farm_1->getAnimals();