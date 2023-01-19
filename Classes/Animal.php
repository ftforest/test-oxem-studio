<?php

namespace Classes;

abstract class Animal
{
    public $resource_name;
    public $resource_measure;
    public $resource_min;
    public $resource_max;
    private static $last_id = 1;

    /**
     * @var integer|string
     */
    protected $id;


    public function __construct($id)
    {
        $this->id = self::$last_id."_".$id;
        self::$last_id++;
    }

    /**
     * @return integer|string
     */
    public function getId()
    {
        return $this->id;
    }

    public function getNameAnimal()
    {
        return static::class;
    }
    public function getResurce()
    {
        return rand($this->resource_min,$this->resource_max);
    }

    public function getResurceName()
    {
        return $this->resource_name;
    }

    public function getResurceMeasure()
    {
        return $this->resource_measure;
    }

}