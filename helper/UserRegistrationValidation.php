<?php
include_once 'validationException.php';

class UserRegistrationValidation
{
    public $email;
    public $submit;
    public $username;
    public $password;
    public $lastName;
    public $firstName;
    public $errorMessage;
    public $confirmPassword;

    public function __construct($firstName, $lastName, $email, $username, $password, $confirmPassword, $submit)
    {
        $this->email = $email;
        $this->submit = $submit;
        $this->username = $username;
        $this->password = $password;
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->confirmPassword= $confirmPassword;
    }

    public function checkIsSet()
    {
        if (!isset($this->submit) || !isset($this->firstName) || !isset($this->lastName) || !isset($this->email)
            || !isset($this->username) || !isset($this->password) || !isset($this->confirmPassword))
        {
            $this->errorMessage .= 'لطفا ابتدا وارد سایت شوید' . "<br>";
        }
    }

    public function checkEmpty()
    {
        if (empty($this->firstName) || empty($this->lastName) || empty($this->email) || empty($this->username)
            || empty($this->password) || empty($this->confirmPassword))
        {
            $this->errorMessage .= 'پر کردن همه فیلد ها الزامی است!' . '<br>';
        }
    }

    public function checkConfirmPassword()
    {
        if ($this->password != $this->confirmPassword)
            $this->errorMessage .= 'تایید پسورد با پسورد مطابقت ندارد. ' . "<br>";
    }

    public function checkUserPassChar()
    {
        if (strlen($this->username) < 3)
        {
            $this->errorMessage .= 'نام کاربری باید حداقل سه کاراکتر باشد.' . '<br>';
        }
        if ((!preg_match('/(([a-z]+[A-Z]+[0-9]+)|([A-Z]+[a-z]+[0-9]+)|([0-9]+[A-Z]+[a-z]+)|([0-9]+[a-z]+[A-Z]+)|([a-z]+[0-9]+[A-Z]+)|([A-Z]+[0-9]+[a-z]+))/'
                , $this->password)) || (strlen($this->password) < 8))
        {
            $this->errorMessage .= 'کلمه عبور باید حداقل 8 کاراکتر باشدو شامل حروف کوچک و بزرگ و اعداد باشد.' . '<br>';
        }
    }

    public function getErrors()
    {
        if (!empty ($this->errorMessage))
        {
            throw new ValidationException($this->errorMessage, 400);
        }
    }

    /**
     * @throws ValidationException
     */
    public function validate()
    {
        $this->checkIsSet();
        $this->checkEmpty();
        $this->checkUserPassChar();
        $this->checkConfirmPassword();
        $this->getErrors();
    }
}

