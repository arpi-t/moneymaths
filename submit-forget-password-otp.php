<?php 
if(isset($_POST)){ 
$OtpMobileNo =  $_POST['OtpMobileNo'];
$mobileOtp =  $_POST['mobileOtp'];
$resendOtp =  $_POST['resendOtp'];

$PostData = array();
$PostData['OtpMobileNo'] = $OtpMobileNo;
$PostData['mobileOtp'] = $mobileOtp;

$curl = curl_init();
$url = 'https://wealthelite.in/Login/login/submit-forget-password-otp';
curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $PostData,
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
    )
));

$response = curl_exec($curl);
curl_close($curl);
echo $response; 
}else{
echo json_encode(array('msgType'=>'error','msg'=>'Invalid OTP'));     
}
?>