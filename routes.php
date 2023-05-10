<?php

use Pecee\SimpleRouter\SimpleRouter;

require_once 'vendor/autoload.php';
require_once 'controller/HomeController.php';
require_once 'controller/RegisterController.php';
require_once 'controller/LoginController.php';
require_once 'controller/FileUploadController.php';
require_once 'controller/UserpanelController.php';
require_once 'controller/UserController.php';
SimpleRouter::get('/sellFile/', [HomeController::class, 'home']);
SimpleRouter::get('/sellFile/RegisterController/getRegisterPage/', [RegisterController::class, 'getRegisterPage']);
SimpleRouter::post('/sellFile/LoginController/getLoginPage/', [LoginController::class, 'getLoginPage']);
SimpleRouter::get('/sellFile/LoginController/getLoginPage/', [LoginController::class, 'getLoginPage']);
SimpleRouter::get('/sellFile/FileUploadController/getUserFileUploadPage/', [FileUploadController::class, 'getUserFileUploadPage']);
SimpleRouter::get('/sellFile/FileUploadController/getGuestFileUpload/', [FileUploadController::class, 'getGuestFileUpload']);
SimpleRouter::post('/sellFile/RegisterController/RegisterRequest/', [RegisterController::class, 'RegisterRequest']);
SimpleRouter::post('/sellFile/LoginController/doLogin/', [LoginController::class, 'doLogin']);
SimpleRouter::post('/sellFile/FileUploadController/doFileUpload/', [FileUploadController::class, 'doFileUpload']);
SimpleRouter::get('/sellFile/UserPanelController/UserPanel/', [UserPanelController::class, 'UserPanel']);
SimpleRouter::get('/sellFile/UserController/doDeactivationPage/', [UserController::class, 'doDeactivationPage']);
SimpleRouter::post('/sellFile/UserController/doDeactivation/', [UserController::class, 'doDeactivation']);
SimpleRouter::get('/sellFile/UserController/getConfirmationPage/', [UserController::class, 'getConfirmationPage']);
SimpleRouter::post('/sellFile/UserController/doConfirmFiles/', [UserController::class, 'doConfirmFiles']);
SimpleRouter::post('/sellFile/UserController/doDeleteFile/', [UserController::class, 'doDeleteFile']);
SimpleRouter::post('/sellFile/UserController/changingUserLevel/', [UserController::class, 'changingUserLevel']);
SimpleRouter::get('/sellFile/FileUploadController/showUploadedFiles/', [FileUploadController::class, 'showUploadedFiles']);
SimpleRouter::get('/sellFile/FileUploadController/showUploadedFileData/', [FileUploadController::class, 'showUploadedFileData']);
SimpleRouter::get('/sellFile/UserController/userProfile/', [UserController::class, 'userProfile']);
SimpleRouter::get('/sellFile/UserController/changeValidationFileTypePage/', [UserController::class, 'changeValidationFileTypePage']);
SimpleRouter::post('/sellFile/UserController/addValidTypes/', [UserController::class, 'addValidTypes']);
SimpleRouter::post('/sellFile/UserController/deleteValidTypes/', [UserController::class, 'deleteValidTypes']);
SimpleRouter::get('/sellFile/UserController/fileSizeManagementPage/', [UserController::class, 'fileSizeManagementPage']);
SimpleRouter::post('/sellFile/UserController/editValidFilesizeUpload/', [UserController::class, 'editValidFilesizeUpload']);
SimpleRouter::get('/sellFile/view/css/style.css', null);
