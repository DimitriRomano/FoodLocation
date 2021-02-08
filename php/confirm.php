<?php
$user_id = $_GET['idusers'];
$token = $_GET['token'];
include('db.php');

$req = $pdo->prepare('SELECT confirmation_token	 FROM users WHERE idusers = ?');
$req->execute([$user_id]);
$user = $req->fetch();

if($user && $user['confirmation_token'] === $token){
    session_start();
    $req = $pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmation_att=NOW() WHERE idusers = ?')->execute([$user_id]);
    $_SESSION['auth']=$user;
    header('Location: index.php');
}else{
    header('Location : ../index.php');
}
?>