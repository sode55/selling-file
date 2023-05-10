<!doctype html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>


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
</div>
<div><h2>آپلود فایل</h2></div>
<p>لطفا اطلاعات زیر را در مورد فایل خود وارد کنید:</p>
<form action="/sellFile/FileUploadController/doFileUpload/" method="post" enctype="multipart/form-data">
    <label for="fileName">:نام فایل</label><br>
    <input type="text" name="fileName" id="fileName" placeholder="نام فایل"><br><br>
    <label for="type">:نوع فایل</label><br>
    <input type="text" name="type" id="type" placeholder="نوع فایل"><br><br>
    <label for="desc">توضیحات فایل:</label><br>
    <textarea name="description" id="desc" rows="5" cols="40" placeholder="توضیحات فایل"></textarea><br><br>
    <label>انتخاب فایل:</label><br><br>
    <input type="file" name="userFile"><br><br>
    <label for="price">قیمت پیشنهادی:</label>
    <input type="number" name="price" id="price" ><br><br>
    <?php
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    ?>
    <input type="hidden" name="ip" value="<?php echo $ip ?>">
    <input type="submit" name="submit" value="guest">
</form>
</body>
</html>
