<?php

/* diner/model/validation.php
 * Validates user input from diner app
 */
class Validation {
    // Food must have at least 2 characters
    static function validFood($food)
    {
        return self::validLength($food, 2);
    }

    // Function to validate the length of inputs
    static function validLength($string, $length)
    {
        return strlen(trim($string)) >= $length;
    }

    // Function to validate the meal
    static function validMeal($meal)
    {
        return in_array($meal, DataLayer::getMeals());
    }
}
