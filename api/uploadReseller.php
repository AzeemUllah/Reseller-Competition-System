<?php
include "config.php";
session_start();

$isFirstRow = true;
 if(isset($_POST["Import"])){

		$filename=$_FILES["file"]["tmp_name"];
		 if($_FILES["file"]["size"] > 0)
		 {
		  	$file = fopen($filename, "r");
	        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
	         {
	         if(!($isFirstRow == true))
	         {
	                $date = date_create($getData[7]);
                   $sql = "INSERT INTO `partner` (`id`, `company_name`, `dexter_reseller_id`, `phone`, `email`, `sales_rep`, `state`, `ABN`)
                       values ('".addslashes($getData[0])."','".addslashes($getData[1])."','".addslashes($getData[2])."',
                       '".addslashes($getData[3])."','".addslashes($getData[4])."','".addslashes($getData[5])."',
                       '".addslashes($getData[6])."','".addslashes($getData[7])."')";
                       $result = mysqli_query($conn, $sql);

                    if(!isset($result))
                    {

                    }
                    else {

                    }

				}
				$isFirstRow = false;

	         }
	         fclose($file);
		 }
	}


$conn->close();
echo "<script>alert('Done!');window.location = './../app.php';</script>";

die();
?>
