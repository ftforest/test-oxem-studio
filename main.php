<?php

abstract class Animal
{
    private $resource_name;
    private $resource_measure;
    private $resource_min;
    private $resource_max;

    /**
     * @var integer|string
     */
    protected $id;


    public function __construct($id) {
        $this->id = $id;
    }

    /**
     * @return integer|string
     */
    public function getId()
    {
        return $this->id;
    }

    public abstract function getNameAnimal();
    public abstract function getResurce();

}



class Cow extends Animal
{
    public static $resource_name = 'молоко';
    public static $resource_measure = 'литры';
    private static $resource_min = 8;
    private static $resource_max = 12;

    public function getNameAnimal()
    {
        return __CLASS__;
    }
    public function getResurce()
    {
        return rand(self::$resource_min,self::$resource_max);
    }
}
class Chicken extends Animal
{
    public static $resource_name = 'яйца';
    public static $resource_measure = 'шт';
    private static $resource_min = 0;
    private static $resource_max = 1;

    public function getNameAnimal()
    {
        return __CLASS__;
    }
    public function getResurce()
    {
        return rand(self::$resource_min,self::$resource_max);
    }
}
class Farm
{

    /**
     * @var Animal[]
     */
    protected static $animals = [];
    private static $products = [];
    public static $debug = false;


    /**
     * Добавляет животное в хлев
     *
     * @param Animal $animl
     * @return void
     */
    public static function pushAnimal(Animal $animl)
    {
        self::$animals[$animl->getId()] = $animl;
    }

    /**
     * Возвращает животное из хлева
     *
     * @param integer|string $id - регистрационный номер животного
     * @return Animal $animl
     */
    public static function getAnimal($id)
    {
        return isset(self::$animals[$id]) ? self::$animals[$id] : null;
    }



    /**
     * Удаляет животное из хлева
     *
     * @param integer|string $id - регистрационный номер животного
     * @return void
     */
    public static function removeProduct($id)
    {
        if (array_key_exists($id, self::$animals)) {
            unset(self::$animals[$id]);
        }
    }

    /**
     * @return Animal[]
     */
    public static function getAnimals()
    {
        $index = 0;$row = 5;
        foreach (self::$animals as $animal){
            if ($index == $row){$index = 0;echo "\n";}
            echo $animal->getNameAnimal()." ".$animal->getId()."\t";
            $index++;
        }
        echo "\n";
    }

    /**
     * @return void
     */
    public static function getCountAnimalsType()
    {
        $type_count = [];
        foreach (self::$animals as $animal){
            $type = $animal->getNameAnimal();
            if (empty($type_count[$type])) $type_count[$type] = 0;
            $type_count[$type]++;
        }
        print_r($type_count);
    }

    /**
     * @return array
     */
    public static function collectionProductsOneDay()
    {
        foreach (self::$animals as $animal){
            $type = $animal->getNameAnimal();
            if (empty(self::$products[$type])) self::$products[$type] = 0;
            self::$products[$type] += $animal->getResurce();
        }
    }

    /**
     * @return array
     */
    public static function getProducts()
    {
        if(self::$debug)print_r(self::$products);
        $nameClasses = array_keys(self::$products);
        foreach ($nameClasses as $nameClass) {
            $animal = new $nameClass($nameClass);
            echo $nameClass.":".self::$products[$nameClass]." ";
            echo $animal::$resource_measure." ";
            echo $animal::$resource_name."\n";
        }
    }
}
for ($i = 1;$i <= 10;$i++ ) {
    Farm::pushAnimal(new Cow($i.'_byrenka'));
}
for ($i = 1;$i <= 20;$i++ ) {
    Farm::pushAnimal(new Chicken($i.'_kloka'));
}
Farm::getAnimals();
Farm::getCountAnimalsType();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::getProducts();
for ($i = 11;$i <= 11;$i++ ) {
    Farm::pushAnimal(new Cow($i.'_byrenka'));
}
for ($i = 21;$i <= 25;$i++ ) {
    Farm::pushAnimal(new Chicken($i.'_kloka'));
}
Farm::getCountAnimalsType();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::collectionProductsOneDay();
Farm::getProducts();