<?php
/* 
    Documentation on: 09-10-2019. No this date is not a palindrome.
    This class simply exists to put together the model, view and controller abstract classes and appropriately call the required controller and view
    using the given url(from navigation).
    Private properties:
    1. controller => represents the controller that is to be called.(Eg.: home)
    2. action => represents the action to be taken by the controller.(Eg.: index)
    3. request => represents the url request. The entire url is passed as request.
    
    Member functions:
    1. __construct($request) => Constructor to get the controller and action parts from the url request.
    2. returnController => Returns a controller instance with the appropriate controller (if it exists) and method.
    
    This is pure boilerplate. Probably will not require much modification. Please document any changes made to this class in the section below.
    Changes:
    ---------------------
*/



class Bootstrap
{



    private $controller;
    private $action;
    private $request;

    public function __construct($request)
    {
        $this->request = $request;
        if ($this->request['controller'] == "") {
            $this->controller = "home";
        } else {
            $this->controller = $this->request['controller'];
            unset($request['controller']);
        }
        if ($this->request['action'] == "") {
            $this->action = "index";
        } else {
            $this->action = $this->request['action'];
            unset($request['action']);
        }
    }

    public function returnController()
    {
        //Check class
        if (class_exists($this->controller)) {
            $parents = class_parents($this->controller);
            //Check extend
            if (in_array("Controller", $parents)) {
                if (method_exists($this->controller, $this->action)) {

                    return new $this->controller($this->action, $this->request);
                } else {
                    //Method doesn't exist
                    echo "<h1>Oops! That page doesn't exist</h1>";
                    return;
                }
            } else {
                //Base Controller does not exist
                echo "Base Controller not found";
                return;
            }
        } else {
            //Controller class doesn't exist
            echo "Controller class doesn't exist";
        }
    }
}
