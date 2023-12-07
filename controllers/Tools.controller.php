<?php


abstract class Tools
{
    public static function showArray($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }

    public static function addAlertMessage($message, $type = 'alert-danger')
    {
        $_SESSION['alert']['message'] = $message;
        $_SESSION['alert']['type'] = $type;
    }

}
