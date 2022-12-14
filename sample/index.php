
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
table, th, td {
  border:1px solid black;
}
</style>
</head>
<body>
<table style="border">
  <tr>
    <th>Line Id</th>
    <th>Line</th>
    <th>Model</th>
    <th>Sub code</th>
    <th>Japan STU</th>
    <th>GPI STU</th>
    <th>Actual Time</th>
    <th>Department</th>



  </tr>
  <?php
session_start();
include ("../connection.php");
date_default_timezone_set("Asia/Singapore");

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
                $lineId = $row['0'];
                $line = $row['1'];
                $model = $row['2'];
                $subcode = $row['3'];
                $japanStu = $row['4'];
                $GPIStu = $row['5'];
                $actualTime = $row['6'];
                $Department = $row['7'];
                $type = $row['8'];


                $sqlinsertModel= "INSERT INTO `model`(`model_name`,`subcode`, `model_line`,  `id_model_line`, `japan_stu`, `gpi_stu`, `actual_time`,`Department`,`type`) VALUES ('$model','$subcode','$line','$lineId','$japanStu','$GPIStu','$actualTime','$Department','$type')";
                mysqli_query($con, $sqlinsertModel);
				?>
				<tr>
    <td><?php echo $lineId?></td>
    <td><?php echo $line?></td>
    <td><?php echo $model?></td>
    <td><?php echo $subcode?></td>
    <td><?php echo $japanStu?></td>
    <td><?php echo $GPIStu?></td>
    <td><?php echo $actualTime?></td>
    <td><?php echo $Department?></td>


  </tr>

				<?php
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
</table>

</body>
</html>

 <form action="index.php" method="POST" enctype="multipart/form-data">

<input type="file" name="import_file" class="form-control" />
<button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

</form>