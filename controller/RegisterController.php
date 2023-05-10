<?php

include_once 'model/UserRoles.php';
include_once 'vendor/autoload.php';
include_once 'helper/validationException.php';
include_once 'helper/UserRegistrationValidation.php';

class RegisterController
{
    public function RegisterRequest()
    {
        try {
            $validation = new UserRegistrationValidation($_POST['firstName'], $_POST['lastName'], $_POST['email'],
                $_POST['username'], $_POST['password'], $_POST['confirmPassword'], $_POST['submit']);
            $validation->validate();

            $user = new UserRoles();
            $user->setUserRoles($_POST);
            header('location:/sellFile/?message=registration successfully');

        } catch (ValidationException $e) {
            echo $e->getErrorMessage();
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function getRegisterPage()
    {
        try {
            require_once 'view/register.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }
}