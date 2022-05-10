<?php

/* diner/model/datalayer.php
 * Returns data for the diner app
 */

// Get the meals for the order form
function getMeals() {
    return array("breakfast", "brunch", "lunch", "dinner");
}

// Get condiments for the order 2 form
function getCondiments() {
    return array("ketchup", "mayo", "mustard", "sriracha", "syrup");
}