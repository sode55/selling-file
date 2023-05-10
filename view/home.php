
<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="view/css/style.css">

</head>
<body>
<div class="header">
    <a href="#default" class="logo">sellFile</a>
    <div class="header-right">
       <span style="color: white"> <?php
        if(isset($_SESSION['username']))
            echo "نام کاربری: " . $_SESSION['username'];
        ?>
       </span>

        <a href="/sellFile/FileUploadController/showUploadedFiles/">مشاهده فایل</a>
        <a href="/sellFile/FileUploadController/getUserFileUploadPage/">آپلود فایل توسط کاربر</a>
        <a href="/sellFile/FileUploadController/getGuestFileUpload/">آپلود فایل توسط مهمان</a>
        <a href="/sellFile/UserPanelController/UserPanel/">ورود به پنل کاربری </a>
        <a href="/sellFile/LoginController/getLoginPage/">ورود</a>
        <a href="/sellFile/RegisterController/getRegisterPage/"> عضویت</a>
        <a class="active" href="/sellFile/">Home</a>
    </div>
</div>
<div style="padding: 30px 80px">
<!--    <script>alert(--><?php //if (isset($_GET['message'])) echo 'notice: ' . ($_GET['message']); ?>//)</script>
<p id="error" dir="ltr"><b> <?php if (isset($_GET['message'])) echo 'notice: ' . ($_GET['message']); ?></b></p><br><br>
<header><h1>قوانین سایت</h1></header>
<h3> کاربر عزیر به سایت sellFile خوش آمدید </h3>
<p> رعایت موارد زیر در آپلود و دانلود فایل الزامی می باشد: </p>

<ul>
    <li>نوع فایل های مجاز برای آپلود pdf, png jpeg  می باشد</li>
    <li>کاربران مهمان می توانند در هر ۲۴ ساعت تا ۵۰۰ مگابایت فایل آپلود نمایند. </li>
    <li>مدت زمان نگه داری فایل های آپلود شده توسط کاربران مهمان ۷۲ ساعت می باشد</li>
</ul>
</div>
</body>

</html>