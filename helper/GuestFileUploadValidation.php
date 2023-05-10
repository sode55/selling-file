<?php

include_once 'model/Settings.php';
include_once 'model/FileUpload.php';
include_once 'validationException.php';

class GuestFileUploadValidation
{
    public $type;
    public $size;
    public $price;
    public $submit;
    public $errors = "";
    public $fileName;
    public $uploadDate;
    public $description;

    public function __construct($fileName, $price, $type, $description, $submit)
    {
        $this->type = $type;
        $this->price = $price;
        $this->submit = $submit;
        $this->fileName = $fileName;
        $this->description = $description;
    }

    public function isSetData()
    {
        if (!isset($this->submit) || !isset($this->fileName) || !isset($this->price) || !isset($this->type) ||
            !isset($this->description))
        {
            $this->errors .= 'لطفا ابتدا وارد سایت شوید' . "<br>";
        }
    }

    public function isEmpty()
    {
        if (empty($this->fileName) || empty($this->price) || empty($this->type) || empty($this->description))
        {
            $this->errors .= 'پر کردن همه فیلد ها الزامی است!' . '<br>';
        }
    }
    public function checkFileSizeValidation()
    {
        $size = new Settings();
        $validSize = $size->getValidFilesizeUpload();
        $validSizeValue = $validSize['valid_size'];

        $file = new FileUpload();
        $totalSize = $file->checkGuestValidFilesize( date('Y-m_d') , $_POST['ip']);

       $this->size = ($_FILES['userFile']['size']);

        if ( (($totalSize + $this->size) / (1024 *1024)) > $validSizeValue ){
           $this->errors = "حجم مجاز آپلود تمام شده است";
        }
    }

    public function checkFileType()
    {
        $fileType = strtolower(pathinfo($_FILES["userFile"]["name"], PATHINFO_EXTENSION));
        $types = new Settings();
        $type = $types->getValidTypes();
        foreach ($type as  $item)
        {
            $validTypes[] = $item['type'];
        }
        if(!in_array($fileType, $validTypes))
        {
            $this->errors .= " تنها فایل های با فرمت pdf ، png و jpeg مجاز هستند . " . "<br>";
        }
    }

    public function checkFileFormat()
    {
        if (!file_exists($_FILES['userFile']['tmp_name']))
        {
            $this->errors .= "انتخاب فایل الزامی است." . "<br>";
        }

        $fileType = strtolower(pathinfo($_FILES["userFile"]["name"], PATHINFO_EXTENSION));

        if ($fileType != $this->type)
        {
            $this->errors .= 'نوع فایل وارد شده با نوع ذکر شده مطابقت ندارد. ' . "<br>";
        }
        if ($_FILES['userFile']['name'] != $this->fileName)
        {
            $this->errors .= 'نام فایل وارد شده با نام ذکر شده مطابقت ندارد. ' . "<br>";
        }

        $target_dir = 'uploads/';
        $target_file = $target_dir . $_FILES['userFile']['name'];

        if (file_exists($target_file))
        {
            $this->errors .= " این فایل قبلا آپلود شده است. " . "<br>";
        }

    }

    public function doFileUpload()
    {
        $target_dir = 'uploads/';
        $target_file = $target_dir . $_FILES['userFile']['name'];

        $fileSize = $_FILES['userFile']['size'];
        $saveFileName = $_FILES['userFile']['name'];
        move_uploaded_file($_FILES['userFile']['tmp_name'], $target_file);
    }

    public function getErrors()
    {
        if (!empty($this->errors))
        {
            throw new ValidationException($this->errors, 400);
        }
    }

    /**
     * @throws ValidationException
     */
    public function uploadValidation()
    {
        $this->isSetData();
        $this->isEmpty();
        $this->checkFileSizeValidation();
        $this->checkFileType();
        $this->checkFileFormat();
        $this->getErrors();
        $this->doFileUpload();
    }
}