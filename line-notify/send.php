<?php 
    session_start();

    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $fname = $_POST['fullname'];
        $sToken = "";  // ใส่ Token ที่ได้จาก Line Notify
        $sMessage = "รายละเอียด\n";
        $sMessage .= "E-mail ".$email."\n";
        $sMessage .= "Fullname ".$fname."\n";


	
        $chOne = curl_init(); 
        curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify"); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
        curl_setopt( $chOne, CURLOPT_POST, 1); 
        curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=".$sMessage); 
        $headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$sToken.'', );
        curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers); 
        curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
        $result = curl_exec( $chOne ); 

        if($result){
            $_SESSION['success'] = "ส่งข้อมูลเรียบร้อยแล้ว";
            header("Location: index.php");
        }else{
            $_SESSION['error'] = "ส่งข้อมูลไม่สำเร็จ";
            header("Location: index.php");
        } 
    }
?>