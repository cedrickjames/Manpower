<?php
session_start();
// include('dbconfig.php');

require '../vendor/autoload.php';
// require('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/Spreadsheet.php');
// require('../vendor/phpoffice/phpspreadsheet/src/PhpSpreadsheet/IOFactory.php');


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $count = "0";
        foreach($data as $row)
        {
            if($count > 0)
            {
                $fullname = $row['0'];
                $email = $row['1'];
              
				
				// echo $fullname;
				// echo "<br>";
				// echo $email;
                // $studentQuery = "INSERT INTO students (fullname,email,phone,course) VALUES ('$fullname','$email','$phone','$course')";
                // $result = mysqli_query($con, $studentQuery);
                $msg = true;
            }
            else
            {
                $count = "1";
            }
        }

        // if(isset($msg))
        // {
        //     $_SESSION['message'] = "Successfully Imported";
        //     header('Location: index.php');
        //     exit(0);
        // }
        // else
        // {
        //     $_SESSION['message'] = "Not Imported";
        //     header('Location: index.php');
        //     exit(0);
        // }
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        // header('Location: index.php');
        // exit(0);
    }
}
?>
 <form action="index.php" method="POST" enctype="multipart/form-data">

<input type="file" name="import_file" class="form-control" />
<button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

</form>