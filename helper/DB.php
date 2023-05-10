<?php
class DB{
    public function connect(){
         $conn= new mysqli('localhost' , 'root' , '', 'upload');
         if($conn->connect_error){
             echo 'no connection';
         }else {echo "no";}
         return $conn;
    }
}
