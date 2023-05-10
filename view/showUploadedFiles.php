<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>show Download files</title>
    <style>
        .main {
            padding: 30px 50px;
        }

        .card {
            display: flex;

        }

        .info {
            padding-right: 100px;
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
<div class="main">
    <div><h2>لیست فایل های تایید شده:</h2></div>
    <br><br>

    <div class="files">

        <?php
        if (!empty($fileData)) {
            foreach ($fileData as $items => $item) {

                ?>
                <div class="card">
                    <div><span> نام فایل:</span>
                        <a href="/sellFile/FileUploadController/showUploadedFileData/?id=<?php echo $item['id'] ?> ">
                            <?php echo $item['file_name'] ?></a>
                    </div>
                    <div class="info">
                        <a href="/sellFile/FileUploadController/showUploadedFileData/?id=<?php echo $item['id'] ?> ">
                            <input type="button" name="fileData" value="مشاهده اطلاعات فایل"></a>

                        <a href="/sellFile/UserController/userProfile/?user_id=<?php echo $item['user_id'] ?> ">
                            <input type="button" name="fileData" value="مشاهده پروفایل کاربر"></a>
                        <a href="/sellFile/uploads/<?php echo $item['file_name'] ?> ">
                            <input type="button" name="fileData" value="دانلود"></a>
                    </div>
                </div><br>
                <?php
            }
        } else echo "result  0";
        ?>
    </div>
</div>
</body>
</html>