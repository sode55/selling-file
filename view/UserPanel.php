
<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <link rel="stylesheet" href="/sellFile/view/css/style.css">
    <meta charset="UTF-8">
    <title>Title</title>
    <style>
        .dropbtn {
            background-color: white;
            color: black;
            padding: 16px;
            font-size: 16px;
            border: 3px solid #90EE90;
            cursor: pointer;
        }

        .dropbtn:hover, .dropbtn:focus {
            background-color: #90EE90;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {background-color: #ddd}

        .show {display:block;}

         .panel{
             display: flex;
             justify-content: space-around;
         }

         table {
             width: 60%;
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
<p id="error" dir="ltr"><b> <?php if (isset($_GET['message'])) echo 'notice: ' . ($_GET['message']); ?></b></p><br><br>

<div class="panel">
    <h1>پنل کاربری</h1>
<div class="more">
    <?php
    if(isset($_SESSION['username']))
        echo "نام کاربری: " . $_SESSION['username'];
     ?>
</div>
   <div class="myDropdown" style="display: <?php if($userPanel[3]['role'] !== 'admin') echo 'none' ?> ">
       <button onclick="myFunction()" class="dropbtn">تنظیمات</button>
       <div id="myDropdown" class="dropdown-content">
           <a href="/sellFile/UserController/doDeactivationPage/">مدیریت کاربران</a>
           <a href=/sellFile/UserController/changeValidationFileTypePage/>مدیریت نوع فایل ها</a>
           <a href="/sellFile/UserController/fileSizeManagementPage/">مدیریت حجم مجاز آپلود مهمان</a>
       </div>
    </div>
    <div class="more" style="display: <?php if($userPanel[3]['role'] !== 'confirmer') echo 'none' ?> ">
        <a class="more" href="/sellFile/UserController/getConfirmationPage/">پنل تایید کننده</a>

    </div>
</div><br><br>
<div>
  <table >
      <div><caption><b>اطلاعات فایل های آپلود شده:</b></caption></div><br>
      <tr>
      <th> نام فایل</th>
          <th> انداره فایل</th>
          <th> قیمت فایل</th>
          <th> نوع فایل</th>
          <th> توضیحات فایل</th>
          <th>تعداد دانلود </th>
      </tr>

          <?php
          foreach ($userPanel[0] as $key=>  $items){

              ?>
      <tr>
          <td>
              <?php var_export($items['file_name']); ?>
          </td>
          <td>
             <?php var_export($items['size']); ?>
          </td>
          <td>
              <?php var_export($items['price']); ?>
          </td>
          <td>
              <?php var_export($items['type']); ?>
          </td>
          <td>
              <?php var_export($items['descp']); ?>
          </td>
          <?php }
          foreach ($userPanel[1] as $items){
          ?>
          <td>
              <?php var_export($items['count']); ?>
          </td>
      </tr>
<?php } ?>
  </table>
</div>
<div>
    <h3>سایز کل فایل ها: <?php var_export($userPanel[4]['totalSize']) ?></h3>
    <h3>اعتبار کاربر: <?php var_export($userPanel[2][0]['COUNT(sold_files.id) * uploaded_files.price']) ?></h3>


</div>
</body>
<script>
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>
</html>