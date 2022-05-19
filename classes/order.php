<?php

class Order
{
    private $_food;
    private $_meal;
    private $_condiments;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_food = "";
        $this->_meal = "";
        $this->_condiments = "";
    }

    /**
     * Method to get food item for order
     * @return string food on order
     */
    public function getFood(): string
    {
        return $this->_food;
    }

    /**
     * Method to set the food item for the order
     * @param string $food food to be ordered
     */
    public function setFood(string $food): void
    {
        $this->_food = $food;
    }

    /**
     * Method to the meal for the order.
     * @return string meal order is for (Breakfast, lunch, etc.)
     */
    public function getMeal(): string
    {
        return $this->_meal;
    }

    /**
     * Method to
     * @param string $meal
     */
    public function setMeal(string $meal): void
    {
        $this->_meal = $meal;
    }

    /**
     * @return string
     */
    public function getCondiments(): string
    {
        return $this->_condiments;
    }

    /**
     * @param string $condiments
     */
    public function setCondiments(string $condiments): void
    {
        $this->_condiments = $condiments;
    }



}