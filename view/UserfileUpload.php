<!doctype html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
    <br><br><br>
</div>
<div><h2>آپلود فایل</h2></div>
<div>
    <p>لطفا اطلاعات زیر را در مورد فایل خود وارد کنید:</p>
    <form action="/sellFile/FileUploadController/doFileUpload/" method="post" enctype="multipart/form-data">
        <label for="fileName">:نام فایل</label>
        <input type="text" name="fileName" id="fileName" placeholder="نام فایل"><br><br>
        <label for="type">:نوع فایل</label>
        <input type="text" name="type" id="type" placeholder="نوع فایل"><br><br>
        <label for="desc">توضیحات فایل:</label>
        <textarea name="description" id="desc" rows="3" cols="40" placeholder="توضیحات فایل"></textarea><br><br>
        <label>انتخاب فایل:</label>
        <input type="file" name="userFile"><br><br>
        <label for="price">قیمت پیشنهادی:</label>
        <input type="text" name="price" id="price"><br><br>
        <input type="submit" name="submit" value="user">
    </form>
</div>
</body>
</html>
