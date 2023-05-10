<?php
//var_dump($userId);

?>
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .form{
            margin 30px;
        }
    </style>
</head>
<body>
<div class="header">
    <a href="#default" class="logo">sellFile</a>
    <div class="header-right">
        <a href="/sellFile/FileUploadController/getUserFileUploadPage/">آپلود فایل توسط کاربر</a>
        <a href="/sellFile/FileUploadController/getGuestFileUpload/">آپلود فایل توسط مهمان</a>
        <a href="/sellFile/UserPanelController/UserPanel/">ورود به پنل کاربری</a>
        <a href="/sellFile/LoginController/getLoginPage/">ورود</a>
        <a href="/sellFile/RegisterController/getRegisterPage/"> عضویت</a>
        <a class="active" href="/sellFile/">Home</a>
    </div>
</div><br><br><br>
<div class="form">
<p>تایید فایل مورد نظر: </p>
<form action="/sellFile/UserController/doConfirmFiles/" method="post">
    <label for="id">آیدی کاربر</label>
    <select name="id" id="id">
        <?php
        foreach ($fileId as $itmes) {

            ?>
            <option name="id" value='<?php echo $itmes['id']  ?>'><?php   echo $itmes['id'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit" value="تایید">
</form><br><br>
<p>حذف فایل مورد نظر: </p>
<form action="/sellFile/UserController/doDeleteFile/" method="post">
    <label for="id">آیدی کاربر</label>
    <select name="id" id="id">
        <?php
        foreach ($fileId as $itmes) {

            ?>
            <option name="id" value='<?php echo $itmes['id']  ?>'><?php   echo $itmes['id'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit" value="تایید">
</form>
</div>
</body>
</html>