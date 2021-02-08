<?php 
error_reporting(0);
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
if(!empty($_POST['email'])){
    require_once 'db.php';
    require_once 'functions.php';
    $req = $pdo->prepare('SELECT * FROM users WHERE email = ? AND confirmation_att IS NOT NULL');
    $req->execute([$_POST['email']]);
    $user = $req->fetch();
    if($user){
        session_start();
        $reset_token = str_random(60);
        $pdo->prepare('UPDATE users SET reset_token = ?, reset_att=NOW() WHERE idusers=?')->execute([$reset_token, $user[0]]);
        $id = $user[0];

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
$mail->addAddress($_POST['email'], 'First Last');
//Set who the message is to be sent to
//Set the subject line
    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Reinitialisation de votre mot de passe';
    $mail->Body    = "Afin de reinitialiser votre mot de passe merci de cliquer 
    sur ce lien \n\n http://localhost/version0/imediapixel.com/templates/warungpring/php/reset.php?idusers={$id}&reset_token=$reset_token";
    $mail->AltBody = 'Reinitialisation de votre mot de passe';
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
    }
}
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Forget</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/Bootstrap.min.css">
    <link rel="shortcut icon" href="images/logo.JPG" type="image/x-icon">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Big+Shoulders+Text&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/fixed.css">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <a class="navbar-brand" href="#">
            <img src="img/nuno.png" alt="logo imag">
        </a>
        <form action="php/search.php" method="get">
            <div class="search-box">
                <input class="search-text" type="text" name="keywords" autocomplete="off" placeholder="Search..">
                <a class="search-btn" href="php/search.php">
                    <i class="fa fa-search"></i></a>
            </div>
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#menu">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#reservation">Reservation</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<!-- Begin page content -->

  <div class="container" style="margin-top:20%;">
    <h1 class="mt-5">Mot de passe oublié</h1>
    <form action="" method="POST">
    <div class="form-group">
        <input type="email" name="email" class="form-control" placeholder="Email">
        <button type="submit" class="btn btn-primary" style="margin-top:0.1%;">Se connecter</button>
    </div>
    </form>
  </div>

</body>
</html>