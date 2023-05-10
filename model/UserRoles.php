<?php
include_once 'User.php';
include_once 'Roles.php';

class UserRoles{

    public function setUserRoles($data){
        $connection = DB::connect();
        $statement = $connection->prepare("INSERT INTO user_role (user_id , role_id) VALUES (?, ?)");
        $statement->bind_param('ii' , $userId , $roleId);

        $user = new Users();
        $userId = $user->registration($data['firstName'], $data['lastName'], $data['email'],
            $data['username'], $data['password']);

        $roles= new Roles();
        $roleId = $roles->setRoles();

        $statement->execute();
    }
}
