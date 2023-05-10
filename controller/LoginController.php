<?php

include_once 'model/user.php';
include_once 'helper/validationException.php';
include_once 'helper/UserLoginValidation.php';

class LoginController
{
    public function doLogin()
    {
        try {
            $validation = new UserLoginValidation($_POST['username'], $_POST['password'], $_POST['submit']);
            $validation->requestValidation();

            $login = new Users();
            $login->login($_POST['username'], $_POST['password']);

                header('location:/sellFile/?message=you are login');
        } catch (ValidationException $e) {
            echo $e->getErrorMessage();
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function getLoginPage()
    {
        try {
            include_once 'view/login.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

}