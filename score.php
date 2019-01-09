<?php $pdo=new PDO('mysql:host=us-cdbr-iron-east-01.cleardb.net;dbname=heroku_981e58cf422b0c3;charset=utf8','b3b0c92eb2969f','29c35b9b'); ?>

<?php
$sql=$pdo->prepare('SELECT * FROM t_mzsoft_score ORDER BY i_correct_anser_number DESC');
$sql->execute([]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>スコア</title>
</head>
<body>
  <h1>成績一覧</h1>
  <table border=1>
    <tr style="background: yellowgreen;">
      <th>ランキング</th>
      <th>正解数</th>
      <th>正答率</th>
      <th>名前</th>
      <th>日付</th>
    </tr>
    <?php $ranking = 1;?>
    <?php foreach ($sql->fetchAll() as $row): ?>
      
      <tr>
        <td><?php echo $ranking?>位</td>
        <td><?=$row['i_correct_anser_number'] ?></td>
        <td><?=$row['i_correct_anser_number'] / 25 * 100 ?>%</td>
        <td><?=$row['v_mzsoft_name'] ?></td>
        <td><?=$row['dt_created'] ?></td>
      </tr>
      <?php $ranking++;?>
    <?php endforeach; ?>
  </table>
</body>
</html>