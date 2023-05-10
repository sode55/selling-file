<?php
include_once 'model/FileUpload.php';
include_once 'helper/UserFileValidation.php';
include_once 'helper/validationException.php';
include_once 'helper/GuestFileUploadValidation.php';

class FileUploadController
{
    public function doFileUpload()
    {
        try {
            if ($_POST['submit'] == 'guest') {
                $validation = new GuestFileUploadValidation($_POST['fileName'], $_POST['price'], $_POST['type'],
                    $_POST['description'], $_POST['submit']);

                $validation->uploadValidation();
            }

            if ($_POST['submit'] == 'user') {
                $validation = new UserFileValidation($_POST['fileName'], $_POST['price'], $_POST['type'],
                    $_POST['description'], $_POST['submit']);

                $validation->uploadValidation();
            }

            $upload = new FileUpload();
            $upload->addFile($_POST['fileName'], $_FILES['userFile']['size'], $_POST['price'],
                $_POST['type'], $_POST['description'], $_POST['ip']);

            header('location:/sellFile/?message=your file uploaded successfully');

        } catch (validationException $e) {
            echo $e->getMessage();
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function getUserFileUploadPage()
    {
        try {
            if (!isset($_SESSION['username'])) {
                header("location:/sellFile/?message= you are not login");
            }
            include_once 'view/UserfileUpload.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function getGuestFileUpload()
    {
        try {
            include_once 'view/guestFileUpload.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function showUploadedFiles()
    {
        try {
            $file = new FileUpload();
            $fileData = $file->getConfirmedFileData();
            include_once 'view/showUploadedFiles.php';

        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }

    }

    public function showUploadedFileData()
    {
        try {
            $file = new FileUpload();
            $fileData = $file->getShowFileData($_GET['id']);
            include_once 'view/showUploadedFileData.php';

        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

}