
 <?php

require 'dbconnect.php';
require 'functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
if (isset($_POST['submit_signup'])) {

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];

if (!filter_var($email , FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/",$username)) {
  header("Location: sign_in.php?error=invalideusername");
  exit();
}elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
  header("Location: sign_in.php?error=invalidemail&username=".$username);
  exit();
}elseif (!preg_match("/^[a-zA-Z0-9]*$/",$username)) {
  header("Location: sign_in.php?error=invalideusername&email=".$email);
  exit();
}elseif ($password !== $passwordRepeat) {
  header("Location: sign_in.php?error=passwordcheckusername=".$username."&email=".$email);
  exit();
}else {
  $sql = "SELECT username FROM users WHERE username=?";
  $stmt = mysqli_stmt_init($dbconnect);
  if (!mysqli_stmt_prepare($stmt,$sql)) {
    header("Location: sign_in.php?error=sqlerror1");
    exit();
  }else {
    mysqli_stmt_bind_param($stmt,"s",$username);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck = mysqli_stmt_num_rows($stmt);
    if ($resultCheck > 0) {
      header("Location: sign_in.php?error=usertaken&email=".$email);
      exit();
    }else {
      $sql = "INSERT INTO users (username , email , password, confirmation_token )
              VALUES (?,?,?,?)";
      $stmt = mysqli_stmt_init($dbconnect);
      if (!mysqli_stmt_prepare($stmt , $sql)) {
        header("Location: sign_in.php?error=sqlerror2");
        exit();
      }else {
        $hashedPwd = password_hash($password , PASSWORD_BCRYPT);
        $token = str_random(60);
        mysqli_stmt_bind_param($stmt , "ssss" , $username ,$email , $hashedPwd,$token);
        mysqli_stmt_execute($stmt);
        $user_id = mysqli_insert_id($dbconnect);
        
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = 2;
//Set the hostname of the mail server
$mail->Host = gethostbyname('smtp.gmail.com');
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
$mail->SMTPOptions = array(
  'ssl' => array(
  'verify_peer' => false,
  'verify_peer_name' => false,
  'allow_self_signed' => true
  )
  );
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'foodlocationrest@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'Azerty2019';
//Set who the message is to be sent from
$mail->setFrom('foodlocationrest@gmail.com', 'First Last');
//Set an alternative reply-to address
$mail->addAddress($email, 'First Last');
//Set who the message is to be sent to
//Set the subject line
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Confirmation de votre compte';
    $mail->Body    = "Afin de valider votre compte merci de cliquer sur ce lien
    \n\n http://localhost/version0/imediapixel.com/templates/warungpring/php/confirm.php?idusers=$user_id&token=$token";
    $mail->AltBody = 'Confirmation de votre compte';
//Attach an image file
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: '. $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
//Section 2: IMAP
//IMAP commands requires the PHP IMAP Extension, found at: https://php.net/manual/en/imap.setup.php
//Function to call which uses the PHP imap_*() functions to save messages: https://php.net/manual/en/book.imap.php
//You can use imap_getmailboxes($imapStream, '/imap/ssl', '*' ) to get a list of available folders or labels, this can
//be useful if you are trying to get this working on a non-Gmail IMAP server.
function save_mail($mail)
{
    //You can change 'Sent Mail' to any other folder or tag
    $path = '{imap.gmail.com:993/imap/ssl}[Gmail]/Sent Mail';
    //Tell your server to open an IMAP connection using the same username and password as you used for SMTP
    $imapStream = imap_open($path, $mail->Username, $mail->Password);
    $result = imap_append($imapStream, $path, $mail->getSentMIMEMessage());
    imap_close($imapStream);
    return $result;
}
        exit();
        
      }
    }
  }
}
mysqli_stmt_close($stmt);
mysqli_close($dbconnect);
}
 ?>
