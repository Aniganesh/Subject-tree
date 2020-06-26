<?php
/* 
    Documentation on: 09-10-2019. No this date is not a palindrome.
    Private properties: 
    1. registeredprev => boolean value to indicate if the person trying to register has already been registered in the database.
    2. mailsent => boolean value to indicate if the mail was successfully sent.

    Public functions:
    1. setregisteredprev($val) => sets the $registeredprev property to $val if the $val is boolean otherwise returns an error message.
    2. getregisteredprev() => returns the $registeredprev property.
    3. setmailsent($val) => sets the $mailsent property to $val if the $val is boolean otherwise returns an error message.
    4. getmailsent() => returns the $mailsent property.

    Not bolierplate. May be scrapped or modified in the future. 

*/

class Views
{
    private $registeredprev = false;
    private $mailsent = false;
    private $unverified = false;
    public function setregisteredprev($val)
    {
        if (is_bool($val)) {
            $this->registeredprev = $val;
        } else return "Error! Value needs to be a boolean";
    }

    public function getregisteredprev()
    {
        return $this->registeredprev;
    }

    public function setmailsent($val)
    {
        if (is_bool($val)) {
            $this->mailsent = $val;
        } else return "Error! Value needs to be a boolean";
    }

    public function getmailsent()
    {
        return $this->mailsent;
    }

    public function getUnverified()
    {
        return $this->unverified;
    }

    function setUnverified($val)
    {
        if (is_bool($val)) {
            $this->unverified = $val;
        } else
            return "Error! Value needs to be a boolean";
    }

   
}
