<?php

// generate a random number
include './db.php';

session_start();
$mobile =$_POST['mobile'];
$email = $_POST['email'];
$otp =  rand(100000,999999);

$sql_check_mobile_no= "SELECT * FROM user_details WHERE mobile ='$mobile'";
$result_check_mobile_no = mysqli_query($conn, $sql_check_mobile_no);
if(mysqli_num_rows($result_check_mobile_no) > 0 ){
    echo '3';
}
else{
    $sql_email_check = "SELECT * From user_details WHERE email = '$email'";
    $result_email_check = mysqli_query($conn, $sql_email_check);
    if(mysqli_num_rows($result_email_check)> 0){
        echo "2";
    }
    else{         $fields = array(
		   "sender_id" => "DMSCLG",
		     "message" => "159475",
		     "variables_values" => $otp,
		     "route" => "dlt",
		     "numbers" => $mobile,
		 );

		 $curl = curl_init();

		 curl_setopt_array($curl, array(
		   CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
		  CURLOPT_RETURNTRANSFER => true,
		   CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_SSL_VERIFYHOST => 0,
		  CURLOPT_SSL_VERIFYPEER => 0,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => json_encode($fields),
		  CURLOPT_HTTPHEADER => array(
		    "authorization: enMHh29XWRsEAT3km1iwtDl8YyF5b0gcSLx7p4qIP6odBjzCOraYMyRohu7BNKvmZbS8jqdL59kcg4zl",
		    "accept: */*",
		    "cache-control: no-cache",
		    "content-type: application/json"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
        $_SESSION['otp']= $otp;
		 echo "1";
    }
}

?>