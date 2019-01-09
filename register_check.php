<?php $pdo=new PDO('mysql:host=heroku_981e58cf422b0c3;dbname=us-cdbr-iron-east-01.cleardb.net;charset=utf8','b3b0c92eb2969f','29c35b9b'); ?>

<?php
$sql=$pdo->prepare('
  insert into t_mzsoft_score(v_mzsoft_name, i_correct_anser_number)
  values(?,?)
  ');

$sql->execute([
  htmlspecialchars($_POST['v_mzsoft_name']),
  htmlspecialchars($_POST['i_correct_anser_number'])
]);

header('Location: score.php');
exit();
