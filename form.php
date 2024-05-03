<?php
$fname=$_POST['fname'];
$email=$_POST ['email'];
$phone=$_POST['phone'];
$subject=$_POST['subject'];


if(isset($fname) && isset($email))
{
    global $to_email,$vpb_message_body,$header;
    $to_email="Willisopiyo95@gmail.com";
    $email_subject="Inquiry from contact page";
    $vpb_message_body = nl2br("Dear Admin,\n
	The user whose detail is shown below has sent this message from ".$_SERVER['HTTP_HOST']." dated ".date('d-m-Y').".\n

    Name:".$fname." \n
    Email Address: ".$email."\n
    Phone No:".$phone."\n
    comment:".$subject."\n



    Thank you!\n\n");
    

}


?>