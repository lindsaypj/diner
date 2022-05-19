<?php

/* diner/model/datalayer.php
 * Returns data for the diner app
 */
class DataLayer {

    // Get the meals for the order form
    static function getMeals() {
        return array("breakfast", "brunch", "lunch", "dinner");
    }

    // Get condiments for the order 2 form
    static function getCondiments() {
        return array("ketchup", "mayo", "mustard", "sriracha", "syrup");
    }

}