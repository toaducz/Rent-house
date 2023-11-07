<?php
include('config/config.php');
?>
<?php
if (isset($_POST['submit_email']) && $_POST['email']) {
    global $email, $db;
    $email = ($_POST['submit_email']);
    $sql = "SELECT * FROM tenant where email='$email' LIMIT 1";
    $sql1 = "SELECT * FROM owner where email='$email' LIMIT 1";
    $sql2 = "SELECT * FROM admin where email='$email' LIMIT 1";
    $result = $db->query($sql);
    $result1 = $db->query($sql1);
    $result2 = $db->query($sql2);
    if ($result->num_rows == 1 or $result1->num_rows == 1 or $result2->num_rows == 1) {
        $link = "<a href='https://www.allphptricks.com/forgot-password/index.php?key=" . $email . "&reset=" . $pass . "'>Click To Reset password</a>";
        require("PHPMailerAutoload.php");
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->IsSMTP();
        // enable SMTP authentication
        $mail->SMTPAuth = true;
        // GMAIL username
        $mail->Username = "nvantai742@gmail.com";
        // GMAIL password
        $mail->Password = "vyvyvyvy";
        $mail->SMTPSecure = "ssl";
        // sets GMAIL as the SMTP server
        $mail->Host = "smtp.gmail.com";
        // set the SMTP port for the GMAIL server
        $mail->Port = "587";
        $mail->From = 'nvantai742@gmail.com';
        $mail->FromName = 'your_name';
        $mail->AddAddress('reciever_email_id', 'reciever_name');
        $mail->Subject = 'Reset Password';
        $mail->IsHTML(true);
        $mail->Body = 'Click On This Link to Reset Password ' . $pass . '';
        if ($mail->Send()) {
            echo "Check Your Email and Click on the link sent to your email";
        } else {
            echo "Mail Error - >" . $mail->ErrorInfo;
        }
    }
}
?>