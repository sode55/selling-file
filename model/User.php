<?php
session_start();
include_once 'C:\xampp\htdocs\www\com-project\sellFile\sellFile-main\helper\DB.php';
include_once 'Roles.php';

class Users
{
    public $firstName;
    public $lastName;
    public $email;
    public $username;
    public $password;

    public function registration($firstName, $lastName, $email, $username, $password)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;

        $connection = DB::connect();
        $cryptPass = crypt($this->password, password_hash($this->password, PASSWORD_DEFAULT));
        $statement = $connection->prepare("INSERT INTO user (first_name, last_name, email, username, password)
        VALUES (?, ?, ?, ?, ?)");
        $statement->bind_param('sssss', $this->firstName, $this->lastName, $this->email, $this->username,
            $cryptPass);
        $statement->execute();
        $lastUserId = $connection->insert_id;

        return $lastUserId;
    }

    public function login($username, $password)
    {
        $this->username = $username;
        $this->password = $password;

        $connection = DB::connect();
        $sql = "SELECT username, password, deactive FROM user WHERE username = '" . $this->username . "' ";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($this->password, $row['password'])) {
                if ($row['deactive'] == 1) {

                    die('you are deactive');
                }
                $_SESSION['username'] = $this->username;
//                    header('location:index.php');
            } else {
                die('your username or password is wrong');
            }
        } else {
            die(' your username or password is wrong');
        }
    }

    public function userLevel()
    {
        $checkUsername = $_SESSION['username'];
        $connection = DB::connect();
        $sql = "SELECT role FROM roles WHERE id IN (SELECT role_id FROM user_role WHERE user_id 
                 IN (SELECT id FROM user WHERE username = '$checkUsername'))";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        return $row['role'];
    }

    public function deactivation($id)
    {
        $connection = DB::connect();

        $sql1 = "UPDATE user SET deactive= 1 WHERE id = '$id'";
        $connection->query($sql1);
        $sql = "SELECT username FROM user WHERE id = '$id'";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $user = $row['username'];
            unset($_SESSION['username']->$user);
        }
    }

    public function changeUserLevel($id)
    {
        $connection = DB::connect();
        $sql = "UPDATE roles SET role = 'admin' WHERE id IN (SELECT role_id FROM user_role WHERE user_id = '$id')";
        $connection->query($sql);
        echo 'user level changed to admin ';
        header('location:/sellFile/UserPanelController/UserPanel/?message=user level changed to admin  ');
    }

    public function userData()
    {
        $connection = DB::connect();
        $sql = "SELECT id FROM user";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id[] = $row;
            }

            return $id;
        }
    }

    public function getFilId()
    {
        $connection = DB::connect();
        $sql = "SELECT id FROM uploaded_files";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $id[] = $row;
            }

            return $id;
        }
    }

    public function fileConfirmation($id)
    {
        $connection = DB::connect();
        $sql = "UPDATE 	uploaded_files SET is_confirmed = 1 WHERE id = '$id'";
        $connection->query($sql);
    }

    public function deleteFile($id)
    {
        $connection = DB::connect();
        $sql = "DELETE FROM `uploaded_files` WHERE id = '$id'";
        $connection->query($sql);
    }

    public function userProfileData($userId)
    {
        $row = [];
        $row1 = [];
        $connection = DB::connect();

        $sql = "SELECT COUNT(id) AS FileNum FROM uploaded_Files WHERE user_id = '$userId'";
        $sql1 = "SELECT deactive, username ,id  FROM user WHERE id = '$userId'";
        $result = $connection->query($sql);
        $result1 = $connection->query($sql1);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }

        if ($result1->num_rows > 0) {
            $row1 = $result1->fetch_assoc();
        }

        return [$row, $row1];
    }
}
