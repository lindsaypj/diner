<?php

/* diner/model/datalayer.php
 * Returns data for the diner app
 */
class DataLayer {
    /**
     * This field represents our database connection object
     * @var PDO
     */
    private $_dbh;

     function __construct()
     {
         // TODO: Move try-catch from config.php to here
         require_once $_SERVER['DOCUMENT_ROOT'].'/../config.php';
         $this->_dbh = $dbh;
         $this->_dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $this->_dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
     }

     function saveOrder($order)
     {
         // Define query
         $sql = "INSERT INTO diner_order (food, meal, condiments) VALUES (:food, :meal, :condiments)";

         // Prepare statement
         $statement = $this->_dbh->prepare($sql);

         // Bind parameters
         $food = $order->getFood();
         $meal = $order->getMeal();
         $condiments = $order->getCondiments();
         $statement->bindParam(':food', $food, PDO::PARAM_STR);
         $statement->bindParam(':meal', $meal, PDO::PARAM_STR);
         $statement->bindParam(':condiments', $condiments, PDO::PARAM_STR);

         // Execute statement
         $statement->execute();

         // Process result
         return $this->_dbh->lastInsertId();
     }

     function viewOrders()
     {
         $sql = "SELECT * FROM diner_order";
         $statement = $this->_dbh->prepare($sql);
         $statement->execute();

         return $statement->fetchAll(PDO::FETCH_ASSOC);
     }


    /* STATIC METHODS */

    // Get the meals for the order form
    static function getMeals() {
        return array("breakfast", "brunch", "lunch", "dinner");
    }

    // Get condiments for the order 2 form
    static function getCondiments() {
        return array("ketchup", "mayo", "mustard", "sriracha", "syrup");
    }

}