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

	             $end_user_amount = str_replace( ',', '', $getData[6]);


                   $sql = "INSERT INTO `monthly_data` (`id`, `year`, `month`, `segment`, `purchase_type`, `lisence_term`, `end_user_amount`)
                       values ('".addslashes($getData[0])."','".addslashes($getData[1])."','".addslashes($getData[2])."',
                       '".addslashes($getData[3])."','".addslashes($getData[4])."','".addslashes($getData[5])."',
                       '".$end_user_amount."')";
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


	$sql = "DELETE FROM `monthly_data` WHERE `monthly_data`.`id` = 0";

    if ($conn->query($sql) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

 echo "1";
$conn->close();
echo "<script>alert('Done!');window.location = './../app.php';</script>";

die();
?>
