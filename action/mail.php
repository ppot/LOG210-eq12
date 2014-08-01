<?php
require_once('class.phpmailer.php');
/**
* 
*/
class Mail
{
	
	function __construct(){}


	public static function sendMail($firtname,$lastname,$address,$message)
	{
		$mail             = new PHPMailer();

		$body             = $message;
		//$body             = eregi_replace("[\]",'',$body);

		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "ssl://smtp.gmail.com"; // SMTP server
		// $mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
		                                           // 1 = errors and messages
		                                           // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "log210eq12@gmail.com";  // GMAIL username
		$mail->Password   = "ZaQ13257a";            // GMAIL password

		$mail->SetFrom('log210eq12@gmail.com', 'ORDER');


		$mail->Subject 	  = "ORDER review";


		$mail->MsgHTML($body);

		$mail->AddAddress($address, $firtname." ".$lastname);


		if(!$mail->Send()) {
		  // echo "Mailer Error: " . $mail->ErrorInfo;
		} 
		else {
		  // echo "Message sent!";
		}
	}
}





?>