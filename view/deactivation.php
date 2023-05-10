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
                margin-right: 40px;
                padding-right: 40px;
            }
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
    <p>غیر فعال کردن کاربر:</p>
    <form action="/sellFile/UserController/doDeactivation/" method="post">
    <label for="id">آیدی کاربر</label>
    <select name="id" id="id">
        <?php
        foreach ($userId as $itmes) {

           ?>
            <option name="id" value='<?php echo $itmes['id']  ?>'><?php   echo $itmes['id'] ?></option>
            <?php
        }
        ?>
    </select>
    <input type="submit" name="submit" value="تایید">
</form><br><br>
    <p>تغییر سطح دسترسسی کاربر:</p>
    <form action="/sellFile/UserController/changingUserLevel/" method="post">
        <label for="id">آیدی کاربر</label>
        <select name="id" id="id">
            <?php
            foreach ($userId as $itmes) {

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