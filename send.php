<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $to = "kimasopruttosilas@gmail.com";
    $subject = "New Form Submission";
     $message = "username:" . $_POST["username"]. "br";
     $message = "email:" . $_POST["email"]. "br";
     $message = "comment:" . $_POST["comment"]. "br";
     $headers =  "From: reply@yourdomain.com";

     if (mail($to, $subject, $message, $headers))
     {
        echo "message send";
     }
     else {
        echo "message failed to send";
     }
}
?>