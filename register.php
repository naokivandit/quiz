<?php
$i_correct_anser_number = $_GET['num'];
$i_correct_anser_ratio = round($_GET['num'] / 25 * 100, 1);
?>

<h1>ランキング登録</h1>
正解数：<?php echo $i_correct_anser_number ?> / 25<br>
正答率：<?php echo $i_correct_anser_ratio ?>%

<form action="register_check.php" method="post">
  <input type="hidden" name="i_correct_anser_number" value="<?php echo $i_correct_anser_number ?>">
  <input type="hidden" name="i_correct_anser_ratio" value="<?php echo $i_correct_anser_ratio ?>">
  名前<input type="text" name="v_mzsoft_name">
  <input type="submit" value="登録">
</form>