<?php

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$priority = $_POST['priority'];
$hbd = $_POST['hbd'];
$mesg = $_POST['messagetxt'];

$message = "ประเภท ".$priority."\nจาก: ".$name."\nอีเมล์: ".$email."\nเบอร์โทร : ".$phone."\n**HBD : ".$hbd."\nข้อความเพิ่มเติม\n".$mesg;

if($name<>"" || $email <> "" || $phone <> "" || $mesg <> "") {
	
	sendlinemesg();

	header('Content-Type: text/html; charset=utf-8');
	$res = notify_message($message);
	echo "<center>l;ส่งข้อความเรียบร้อยแล้ว</center>";
} else {
	echo "<center>Error: กรุณากรอกข้อมูลให้ครบถ้วน</center>";
}

function sendlinemesg() {
	
    define('LINE_API',"https://notify-api.line.me/api/notify");
	define('LINE_TOKEN','x1Y04k8ZeX5oQJ9zsXEgJPKhC6IqJuGC6Ystw2Y19eX');

	function notify_message($message){

		$queryData = array('message' => $message);
		$queryData = http_build_query($queryData,'','&');
		$headerOptions = array(
			'http'=>array(
				'method'=>'POST',
				'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
						."Authorization: Bearer ".LINE_TOKEN."\r\n"
						."Content-Length: ".strlen($queryData)."\r\n",
				'content' => $queryData
			)
		);
		$context = stream_context_create($headerOptions);
		$result = file_get_contents(LINE_API,FALSE,$context);
		$res = json_decode($result);
		return $res;

	}

}

?>