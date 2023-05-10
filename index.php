<?php
ini_set('display_errors' , 1);
error_reporting(E_ALL);
include_once 'vendor/autoload.php';
include_once 'routes.php';
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::start();
//SimpleRouter::setDefaultNamespace('\Demo\Controllers');

















