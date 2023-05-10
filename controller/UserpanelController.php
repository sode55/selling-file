<?php
include_once 'model/FileUpload.php';

class UserPanelController
{
    public function UserPanel()
    {
        try {
            if (!isset($_SESSION['username']))
            {
                header("location:/sellFile/?message= you are not login");
            }
            $panel = new FileUpload();
            $userPanel = $panel->getFileData();
            include_once 'view/UserPanel.php';
        } catch (Throwable $t) {
            echo 'sorry, something went wrong. please try again later';
        }
    }
}
