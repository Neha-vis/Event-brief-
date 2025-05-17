<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/PHPMailer/src/Exception.php';
require_once 'PHPMailer/PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/PHPMailer/src/SMTP.php';
$mail = new PHPMailer;

$mail->isSMTP();

$mail->Host = 'smtp-relay.gmail.com';
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = 'tls';
$mail->Username = 'webdesigner12@sibinfotech.in';
$mail->Password = 'ZarOon@123';
$mail->Port = 587;
$mail = new PHPMailer(TRUE);

if(isset($_POST['submit']))
    {
    if (!empty($_POST['hidden'])) {
        die();
    }
    $name= $_POST['name'];
    $phone= $_POST['phone'];
    $email= $_POST['email'];
    $building_cost= $_POST['building_cost'];
    $property_address= $_POST['property_address'];
    $property_type= $_POST['property_type'];
    $date= $_POST['date'];
    $message= $_POST['message'];
    $body_message ="
    <p>Dear Admin,</p>
    <p>You have received an enquiry from:</p>
    <table width='500' border='1' cellspacing='0'>
        <tr>
            <td style='padding:10px;' width='200'>Name</td>
            <td style='padding:10px;'>".$name."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Phone Number</td>
            <td style='padding:10px;'>".$phone."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Email</td>
            <td style='padding:10px;'>".$email."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Building Cost</td>
            <td style='padding:10px;'>".$building_cost."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Property Address</td>
            <td style='padding:10px;'>".$property_address."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Property Type</td>
            <td style='padding:10px;'>".$property_type."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Date of Acquisition</td>
            <td style='padding:10px;'>".$date."</td>
        </tr>
        <tr>
            <td style='padding:10px;' width='200'>Describe Case</td>
            <td style='padding:10px;'>".$message."</td>
        </tr>
    </table>";
    
    $mail->setFrom("robert@costsegregationservices.com", "CSSI - Landing Page");
    $mail->Body = $body_message;
    
    $mail->AddAddress('sib.zaroon@gmail.com');
    //$mail->AddBcc('testing@sibinfotech.com');
    $mail->Subject = "New inquiry from CSSI -Landing Page ";
    $mail->IsHTML(true);
   /* Finally send the mail. */
   if ($mail->send()) { 

    ?>

    <script language="javascript" type="text/javascript">
        window.location = "thanks.php";
    </script>
    <?php 
    } 
    else {
    // echo 'Mailer Error: ' . $mail->ErrorInfo; exit;
    ?>
    <script language="javascript" type="text/javascript">
        alert("Message failed. Please try again");
        window.location = "index.php";
    </script>
    <?php 
    }
}


?>