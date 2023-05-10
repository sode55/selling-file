<?php
include_once 'C:\xampp\htdocs\www\com-project\sellFile\sellFile-main\helper\DB.php';

class Settings
{
    public $type;

    public function editValidTypes($type)
    {
        $this->type = $type;
        $connection = DB::connect();
        $statement = $connection->prepare("INSERT INTO settings (type) VALUES (?)");
        $statement->bind_param('s', $this->type);
        $statement->execute();
    }

    public function deleteValidType($type)
    {
        $connection = DB::connect();
        $sql = "DELETE  FROM settings WHERE  type = '$type'";
        $connection->query($sql);
    }

    public function getValidTypes()
    {
        $typws = [];
        $connection = DB::connect();
        $sql = "SELECT type FROM settings";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $types[] = $row;
            }
        }

        return $types;
    }

    public function editValidSizeUpload($validSize)
    {
        $connection = DB::connect();
        $sql = "UPDATE valid_size_settings SET valid_size = '$validSize' ";
        $connection->query($sql);
    }

    public function getValidFilesizeUpload()
    {
        $connection = DB::connect();
        $sql = "SELECT valid_size FROM valid_size_settings";
        $result = $connection->query($sql);
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        }

        return $row;
    }
}

