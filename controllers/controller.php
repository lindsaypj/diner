<?php

// 328/diner/controllers/controller.php

class Controller
{
    private $_f3;

    function __construct($f3)
    {
        $this->_f3 = $f3;
    }

    function home()
    {
        $view = new Template();
        echo $view->render('views/home.html');
    }

    function breakfast()
    {
        $view = new Template();
        echo $view->render('views/breakfast.html');
    }

    function lunch()
    {
        $view = new Template();
        echo $view->render('views/lunch.html');
    }

    function dinner()
    {
        $view = new Template();
        echo $view->render('views/dinner.html');
    }

    function order()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get form data
            $food = $_POST['food'];
            $this->_f3->set('userFood', $food);
            $meal = $_POST['meal'] ?? "";
            $this->_f3->set('userMeal', $meal);

            // Order object to store valid details
            $order = new Order();

            // Validate form data
            // Validate Food
            if (Validation::validFood($food)) {
                $order->setFood($food);
            }
            else {
                $this->_f3->set('errors["food"]', 'Please enter a food at least 2 characters');
            }
            // Validate Meal
            if (Validation::validMeal($meal)) {
                $order->setMeal($meal);
            }
            else {
                $this->_f3->set('errors["meal"]', 'Please select a meal');
            }

            // If no errors -> Redirect to next page
            if (empty($this->_f3->get("errors"))) {
                $_SESSION['order'] = $order;
                header('location: order2');
            }
        }

        // Add meals to Fat-Free hive (Form options)
        $this->_f3->set('meals', DataLayer::getMeals());

        $view = new Template();
        echo $view->render('views/order_form1.html');
    }

    function order2()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conds = empty($_POST['conds']) ? "none selected" : implode(", ", $_POST['conds']);
            if (Validation::validCondiments($_POST['conds'])) {
                $_SESSION['order']->setCondiments($conds);
                header('location: summary');
            }
            else {
                // TODO: HANDLE BAD CONDIMENTS
            }
        }

        // Add meals to Fat-Free hive
        $this->_f3->set('condiments', DataLayer::getCondiments());

        $view = new Template();
        echo $view->render('views/order_form2.html');
    }

    function summary()
    {
        // Store order in database
        $orderId = $GLOBALS['datalayer']->saveOrder($_SESSION['order']);
        $this->_f3->set('orderId', $orderId);

        $view = new Template();
        echo $view->render('views/order_summary.html');

        // Clear the session array
        session_destroy();
    }

    function admin()
    {
        // Get orders from database
        $this->_f3->set('orders', $GLOBALS['datalayer']->viewOrders());

        // Render Admin page
        $view = new Template();
        echo $view->render('views/admin.html');
    }
}