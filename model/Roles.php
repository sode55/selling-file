<?php
include_once 'C:\xampp\htdocs\www\com-project\sellFile\sellFile-main\helper\DB.php';

class Roles
{
    const roles = [0 => 'admin', 1 =>'common_user', 2 => 'guest'];

    public function setRoles(){
        $connection = DB::connect();
        $statement = $connection->prepare("INSERT INTO roles (role) VALUES (?)");
        $statement->bind_param('s' , $role);
        $role= self::roles[1];
        $statement->execute();
        $lastRoleId = $connection->insert_id;
        $connection->close();

        return $lastRoleId;
    }
}

