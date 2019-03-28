<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

?>
<?php 

$user_id = $_GET['id'];

$token = $_GET['token'];

require'db.php';

$req= $pdo->prepare('SELECT * FROM  users WHERE id  = ?');

$req->execute([$user_id]);

$user = $req->fetch();
session_start();
 
if($user && $user->confirmation_token == $token){
	session_start();
	$req =$pdo ->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at=NOW()
	 WHERE id = ?')->execute([$user_id]);
	$_SESSION['auth'] =  $user;

	header('Location:account.php');

}else{
	$_SESSION['flash']['danger']= "Ce token n'est plus valide";

	header('Location:login.php');
}
?>
<?php if(isset($_SESSION['flash'])) :?>
    <?php foreach ($_SESSION['flash'] as $type=>$message):?>
    <div class="alert alert-<?= $type; ?>">
        <?= $message; ?>
    </div>
<?php endforeach ; ?>
<?php unset($_SESSION['flash']); ?>
<?php endif ; ?>
