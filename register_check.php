<?php $pdo=new PDO('mysql:host=localhost;dbname=mzsoft;charset=utf8','testuser','testpass'); ?>

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
