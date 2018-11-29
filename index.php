<!DOCTYPE html>
<html lang="en">
<?php
use PHPMailer\PHPMailer\PHPMailer;
include_once 'PHPMailer-master/PHPMailer.php';
include_once 'PHPMailer-master/SMTP.php';
include_once 'PHPMailer-master/Exception.php';
 include_once 'head.php';?>

               <?php 
                 $check = '';
                   if(isset($_POST['data_submit'])){
                     $sendTo = "sales@amayragreens.com";
                     $subject = "Query from website";
                     $first_name=$_POST['name'];
                     $phone=$_POST['mob'];
                     $email_address=$_POST['email'];
                     $comment=$_POST['Comments'];

                     $message = "query posted by :  
                     \n Name: ". $first_name .
                     "\n mobile: ". $phone .
                     "\n Email: ". $email_address.
                     "\n Query: ". $comment;


                       $mail = new PHPMailer(true);                              
                        try {
                            //Server settings
                            // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.zoho.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'website@dfgdfgdf.com';                 // SMTP username
                            $mail->Password = 'Pass1234';                           // SMTP password
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            //Recipients
                            $mail->setFrom('website@gdfgdf.com', 'Amayra Greens');
                            $mail->addAddress('sales@amayragreens.com') ;            // Name is optional
                            $mail->addReplyTo($email_address, 'Information');


                            //Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Query from website';
                            $mail->Body    = $message;

                            $mail->send();
                            echo "<div align='center' class='mailtext'>Thanks for your Request  <B>". $first_name . " </B> . We have received your message and will contact you soon.</div><br><br>";
                        } catch (Exception $e) {
                            echo 'Message could not be sent.';
                            echo 'Mailer Error: ' . $mail->ErrorInfo;
                        } 

                        $headers = "MIME-Version: 1.0" . "\r\n";
                        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        $headers .= 'From: Amayragreen Admin<admin@3gdfg.com>' . "\r\n";
                        $headers .= 'Reply-To: sales@amayragreens.com' . "\r\n";

                        if(mail('sales@amayragreens.com', $subject, $message, $headers)){
                          echo "<div align='center' class='mailtext'>Thanks for your Request  <B>". $first_name . " </B> . We have received your message and will contact you soon.</div><br><br>";
                        }else{
                          echo 'Message could not be sent.';
                        }
                   }
                 ?>
               
</html>
