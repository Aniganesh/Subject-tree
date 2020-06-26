<?php
/* 
    Documentation on: 09-10-2019. No this date is not a palindrome.
    This class represents the controller of the M-V-C framework. Actual controllers will need to extend this class.
    Protected properties: 
    1. request => represents the url requested by the client.
    2. action => represents the the action to be carried out by the controller.
    These are made protected so as to allow actual controllers to inherit these variables and use them directly.

    Public methods:
    1. __construct($action, $request) => Constructor to initialise action and request properties.
    2. executeAction() => Calls the action that has been set or defined in the class. Obviously this abstract class won't have these values set.
    But the derived classes should have the action that is requested by the client.
    3. returnView($viewModel, $fullView) => Includes the necessary view file to display on the client's page.
    
    This too is pure boilerplate. Probably will not require much modification. Please document any changes made to this class in the section below.
    Changes:
    ------------------------
*/

abstract class Controller
{
    protected $request;
    protected $action;

    public function __construct($action, $request)
    {
        $this->request = $request;
        $this->action = $action;
    }

    public function executeAction()
    {
        if (!is_null($this->request['id'])) {
            $id = $this->request['id'];
            $this->{$this->action}($id);
            return;
        }
        return $this->{$this->action}();
    }


    public function returnView($viewModel, $fullView)
    {
        $view = "view/" . get_class($this) . "/" . $this->action . ".php";
        if ($fullView) {
            require("view/main.php");
        } else {
            require($view);
        }
    }
}
