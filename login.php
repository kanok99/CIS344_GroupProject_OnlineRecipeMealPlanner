<?php
require 'config/db_connect.php';session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
 $username=$_POST['username'];$password=$_POST['password'];
 $stmt=$pdo->prepare('SELECT * FROM users WHERE username=? OR email=? LIMIT 1');
 $stmt->execute([$username,$username]);$user=$stmt->fetch();
 if($user){
  $ok=false;
  if(!empty($user['password_hash'])&&password_verify($password,$user['password_hash']))$ok=true;
  if(!$ok&&!empty($user['password_plain'])&&$password===$user['password_plain'])$ok=true;
  if($ok){session_regenerate_id(true);$_SESSION['user_id']=$user['id'];$_SESSION['username']=$user['username'];header('Location: dashboard.php');exit;}
  else $error='Invalid credentials.';
 }else{$error='User not found.';}
}
?>
<html><body><?php include 'includes/header.php'; ?>
<h2>Login</h2><?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
<form method="post"><label>Username or Email:<input name="username"></label><br>
<label>Password:<input type="password" name="password"></label><br>
<button>Login</button></form><?php include 'includes/footer.php'; ?></body></html>