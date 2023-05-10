
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>show Download files</title>
    <style>
        .main{
            padding: 30px 50px;
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
</div>

<div class="main" >
<div><h2>اطلاعات کاربر:</h2></div><br>
<div><span> <b>نام کاربری:</b></span>
<?php if(!empty($userProfile[1])) var_export($userProfile[1]['username']);
else {
    echo 'کاربر مهمان';
}
 ?>
</div><br>
<div>
    <span><b>وضعیت:</b></span>
    <?php if(!empty($userProfile[1]) && $userProfile[1]['deactive'] == 0)  echo 'فعال';
    ?>
</div><br>
    <div>
        <span><b>تعداد فایل آپلود شده:</b></span>
        <?php if(!empty($userProfile[0]) and !empty($userProfile[1])) echo $userProfile[0]['FileNum']?>
    </div>
</div>
</body>
</html>