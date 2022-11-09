
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
    <th>Year</th>
    <th>Month</th>
    <th>Day</th>
    <th>Date</th>






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
    
                $date = $row['4'];
// singlebyte strings
$year = substr($date, 0, 4);
// multibyte strings
$month = mb_substr($date, 4, 2);
$day = mb_substr($date, 6, 2);
$dueDate = $year.'-'.$month.'-'.$day;

if($month=='11'){


				?>
				<tr>
    <td><?php echo $year?></td>
    <td><?php echo $month?></td>
    <td><?php echo $day ?></td>
    <td><?php echo $dueDate ?></td>




  </tr>

				<?php
}
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

 <form action="export.php" method="POST" enctype="multipart/form-data">

<input type="file" name="import_file" class="form-control" />
<button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

</form>