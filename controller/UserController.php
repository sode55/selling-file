<?php
include_once 'model/user.php';
include_once 'model/Settings.php';

class UserController
{
    public function doDeactivationPage()
    {
        try {
            $user = new Users();
            $userId = $user->userData();
            include_once 'view/deactivation.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function doDeactivation()
    {
        try {
            $deactivatedUser = new Users();
            $deactivatedUser->deactivation($_POST['id']);

            header('location:/sellFile/UserPanelController/UserPanel/?message=user was deacivated successfully');
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function changingUserLevel()
    {
        try {
            $level = new users();
            $level->changeUserLevel($_POST['id']);

        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function getConfirmationPage()
    {
        try {
            $file = new users();
            $fileId = $file->getFilId();
            include_once 'view/confirmationPage.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function doConfirmFiles()
    {
        try {
            $file = new users();
            $file->fileConfirmation($_POST['id']);

            header('location:/sellFile/UserPanelController/UserPanel/?message=file confirmed successfully');

        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function doDeleteFile()
    {
        try {
            $user = new users();
            $user->deleteFile($_POST['id']);

            header('location:/sellFile/UserPanelController/UserPanel/?message=file deleted successfully');

        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function userProfile()
    {
        try {
            $user = new Users();
            $userProfile = $user->userProfileData($_GET['user_id']);
            include_once 'view/userProfile.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function checkUserLevel()
    {
        try {
            $level = new Users();
            $userLevel = $level->userLevel();
            return $userLevel;
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function changeValidationFileTypePage()
    {
        try {
            include_once 'view/changeValidFileSettings.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function addValidTypes()
    {
        try {
            if ($this->checkUserLevel() == 'admin') {
                $validTypes = new Settings();
                $validTypes->editValidTypes($_POST['validTypes']);
                header('location:/sellFile/UserPanelController/UserPanel/?message=valid type changed successfully');
            } else {
                echo 'you are not admin';
                echo $this->checkUserLevel();
            }
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function deleteValidTypes()
    {
        try {
            if ($this->checkUserLevel() == 'admin') {
                $validFile = new Settings();
                $validFile->deleteValidType($_POST['validTypes']);
                header('location:/sellFile/UserPanelController/UserPanel/?message=valid type changed successfully');
            }
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function fileSizeManagementPage()
    {
        try {
            include_once 'view/validFileSizeManagement.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

    public function editValidFilesizeUpload()
    {
        try {
            if ($this->checkUserLevel() == 'admin') {
                $file = new Settings();
                $file->editValidSizeUpload($_POST['validSize']);
                header('location:/sellFile/UserPanelController/UserPanel/?message=valid size changed successfully');
            }
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }

}

