<?php

namespace Classes;



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
    public function pushAnimalCount($class, $name, $count = 1)
    {
        for ($i = 0;$i < $count;$i++) {
            $animl = new $class($name);
            self::$animals[$animl->getNameAnimal()][$animl->getId()] = $animl;
        }
    }

    /**
     * Возвращает животное из хлева
     *
     * @param integer|string $id - регистрационный номер животного
     * @return Animal $animl
     */
    public function getAnimal($type,$id)
    {
        return isset(self::$animals[$type][$id]) ? self::$animals[$type][$id] : null;
    }



    /**
     * Удаляет животное из хлева
     *
     * @param integer|string $id - регистрационный номер животного
     * @return void
     */
    public static function removeAnimal($type,$id)
    {
        if (array_key_exists($id, self::$animals[$type])) {
            unset(self::$animals[$type][$id]);
        }
    }

    /**
     * @return Animal[]
     */
    public function getAnimals()
    {
        $index = 0;$row = 5;
        foreach (self::$animals as $type => $animals) {
            foreach ($animals as $animal){
                if ($index == $row){$index = 0;echo "\n";}
                echo $animal->getNameAnimal()." ".$animal->getId()."\t";
                $index++;
            }
        }
        echo "\n";
    }

    /**
     * @return void
     */
    public function getCountAnimalsType()
    {
        $type_count = [];
        foreach (self::$animals as $type => $animals){
            $type_count[$type] = count($animals);
        }
        print_r($type_count);
    }

    /**
     * @return array
     */
    public function collectionProductsDay($days = 1)
    {
        for ($i = 0;$i < $days; $i++) {
            foreach (self::$animals as $type => $animals){
                foreach ($animals as $animal) {
                    if (empty(self::$products[$type])) self::$products[$type] = 0;
                    self::$products[$type] += $animal->getResurce();
                }
            }
        }
    }

    /**
     * @return array
     */
    public function getProducts()
    {
        if(self::$debug)print_r(self::$products);
        $nameClasses = array_keys(self::$products);
        foreach (self::$animals as $type => $animals) {
            $first_id = array_keys($animals)[0];
            echo $type.":".self::$products[$type]." ";
            echo self::$animals[$type][$first_id]->getResurceName()." ";
            echo self::$animals[$type][$first_id]->getResurceMeasure()."\n";
        }
    }

}