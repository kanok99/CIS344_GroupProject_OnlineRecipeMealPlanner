<?php
require 'config/db_connect.php';
if($_SERVER['REQUEST_METHOD']==='POST'){
 $username=trim($_POST['username']);$email=trim($_POST['email']);$password=$_POST['password'];
 if($username&&$email&&$password){
  $hash=password_hash($password,PASSWORD_DEFAULT);
  $stmt=$pdo->prepare('INSERT INTO users(username,email,password_hash)VALUES(?,?,?)');
  try{$stmt->execute([$username,$email,$hash]);header('Location: login.php');exit;}catch(Exception $e){$error='Error: '.$e->getMessage();}
 }else{$error='All fields required.';}
}
?>
<html><body><?php include 'includes/header.php'; ?>
<h2>Register</h2><?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
<form method="post"><label>Username:<input name="username"></label><br>
<label>Email:<input name="email" type="email"></label><br>
<label>Password:<input name="password" type="password"></label><br>
<button>Register</button></form><?php include 'includes/footer.php'; ?></body></html>