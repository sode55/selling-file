<?php
include_once 'C:\xampp\htdocs\www\com-project\sellFile\sellFile-main\helper\DB.php';

class FileUpload
{
    public $size;
    public $type;
    public $price;
    public $userId;
    public $guestIp;
    public $isGuest;
    public $fileName;
    public $uploadDate;
    public $isConfirmed;
    public $description;

    public function addFile($fileName, $size, $price, $type, $description, $guestIp)
    {
        $this->fileName = $fileName;
        $this->size = $size;
        $this->price = $price;
        $this->type = $type;
        $this->description = $description;
        $this->guestIp = $guestIp;

        $connection = DB::connect();
        if (isset($_SESSION['username'])) {
            $UserUsername = $_SESSION['username'];
            $sql = "SELECT id FROM user WHERE username = '$UserUsername'";
            $u = $connection->query($sql);
            $row = $u->fetch_assoc();
            $id = $row['id'];

            $statement = $connection->prepare("INSERT INTO uploaded_files (file_name,size, price, type,
                descp, user_id, is_guest, upload_date)VALUES (?,?,?,?,?,?,?,?)");
            $statement->bind_param('sisssiis', $this->fileName, $this->size, $this->price, $this->type,
                $this->description, $this->userId, $this->isGuest, $this->uploadDate);
            $this->userId = $id;
            $this->isGuest = 0;
            $this->uploadDate = date('Y-m-d');
            $statement->execute();
        } else {
            $statement = $connection->prepare("INSERT INTO uploaded_files (file_name, size, price, type, descp ,is_guest, is_confirmed, upload_date, guest_ip)
             VALUES (?,?,?,?,?,?,?,?,?)");
            $statement->bind_param('sisssiiss', $this->fileName, $this->size, $this->price, $this->type,
                $this->description, $this->isGuest, $this->isConfirmed, $this->uploadDate, $this->guestIp);
            $this->isGuest = 1;
            $this->isConfirmed = 0;
            $this->uploadDate = date('Y-m-d');
            $statement->execute();
        }
    }

    public function checkGuestValidFilesize($uploadDate, $guestIp)
    {
        $this->uploadDate = $uploadDate;
        $this->guestIp = $guestIp;
        $final = [];
        $connection = DB::connect();
        $sql = "SELECT SUM(size) AS validSize FROM uploaded_files WHERE is_guest = 1 AND upload_date = '$this->uploadDate'
               AND guest_ip = '$this->guestIp'";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $final = $row['validSize'];
            }
            return $final;
        }
    }

    public function getFileData()
    {
        $row = [];
        $row1 = [];
        $row2 = [];
        $row3 = [];
        $row4 = [];
        $checkUsername = $_SESSION['username'];
        $connection = DB::connect();
        $sql = "SELECT id, file_name, size, price, type, descp FROM uploaded_files WHERE user_id IN (SELECT id FROM user WHERE username = '$checkUsername')";
        $sql1 = "SELECT COUNT(id) AS 'count' FROM sold_files WHERE file_id IN (SELECT id FROM uploaded_files WHERE user_id IN (SELECT id FROM 
    user WHERE username = '$checkUsername')) GROUP BY sold_files.file_id";
        $sql2 = "SELECT COUNT(sold_files.id) * uploaded_files.price FROM uploaded_files, sold_files WHERE
           uploaded_files.id = sold_files.file_id AND uploaded_files.user_id IN (SELECT id FROM  user WHERE  username = '$checkUsername')";
        $sql3 = "SELECT role FROM roles WHERE id IN (SELECT role_id FROM user_role WHERE user_id 
                 IN (SELECT id FROM user WHERE username = '$checkUsername'))";
        $sql4 = "SELECT  SUM(size) AS 'totalSize' FROM uploaded_files WHERE  user_id IN (select id FROM  user WHERE username = '$checkUsername')";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $row[] = $rows;
            }
        }
        $result1 = $connection->query($sql1);
        if ($result1->num_rows > 0) {
            while ($rows1 = $result1->fetch_assoc()) {
                $row1[] = $rows1;
            }
        }

        $result2 = $connection->query($sql2);
        if ($result2->num_rows > 0) {
            while ($rows2 = $result2->fetch_assoc()) {
                $row2[] = $rows2;
            }
        }
        $result3 = $connection->query($sql3);
        if ($result3->num_rows > 0) {
            $row3 = $result3->fetch_assoc();
        }
        $result4 = $connection->query($sql4);
        if ($result3->num_rows > 0) {
            $row4 = $result4->fetch_assoc();
        }
        $final = [$row, $row1, $row2, $row3, $row4];

        return $final;
    }

    public function getConfirmedFileData()
    {
        $fileData = [];
        $connection = DB::connect();
        $sql = "SELECT * FROM uploaded_files WHERE 	is_confirmed = 1";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileData[] = $row;
            }
        }

        return $fileData;
    }

    public function getShowFileData($id)
    {
        $fileData = [];
        $numDownload = [];
        $connection = DB::connect();
        $sql = "SELECT * FROM uploaded_files WHERE 	is_confirmed = 1 AND id = $id";
        $sql1 = "SELECT COUNT(id) AS 'count' FROM sold_files WHERE file_id IN (SELECT id FROM uploaded_files 
         WHERE is_confirmed = 1) GROUP BY sold_files.file_id";

        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $fileData[] = $row;
            }
        }

        $result1 = $connection->query($sql1);
        if ($result1->num_rows > 0) {
            while ($row1 = $result1->fetch_assoc()) {
                $numDownload[] = $row1;
            }
        }

        return $allData = [$fileData, $numDownload];
    }
}
