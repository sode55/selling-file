<?php

class HomeController
{
    public function home()
    {
        try {
            include_once 'view/home.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }
}