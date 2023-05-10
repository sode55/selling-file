<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>show Download files</title>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
            width: 60%;
        }

        .title {
            padding-right: 550px;
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
    <br><br><br>
</div>

<?php
//echo $_GET['id'];
var_export($fileData[1][0]['count']);
?>
<div class="title"><h2>اطلاعات فایل</h2></div>
<br>
<table class="center">
    <tr>
        <th>نام فایل</th>
        <th>حجم فایل</th>
        <th>نوع فایل</th>
        <th>وضعیت تایید</th>
        <th>تعداد دانلود</th>

    </tr>
    <tr>
        <td><?php echo $fileData[0][0]['file_name'] ?></td>
        <td><?php echo $fileData[0][0]['size'] ?></td>
        <td><?php echo $fileData[0][0]['type'] ?></td>
        <td><?php if ($fileData[0][0]['is_confirmed'] == 1) echo "تایید شده" ?></td>
        <!--        <td>--><?php //if(isset($fileData[1][0]['count'])) echo $fileData[1][0]['count'] ?><!--</td>-->
    </tr>

</table>
</body>
</html>