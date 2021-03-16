<?php


class ValidateValueException extends Exception
{
    protected $message ;
    public function __construct($message = "")
    {
        $this->message = $message;
    }

    public function printMessage(){
        echo "<br>";
        echo $this->message;
        echo "<br>";
    }


}