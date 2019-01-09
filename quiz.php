<?php
require_once('quiz_list.php'); //クイズのリスト一覧

if(isset($_POST['question']) || $_POST){
  $question = $_POST['question']; //ラジオボタンの内容を受け取る
  $answer = $_POST['answer'];   //回答内容を受け取る
  $question_number = $_POST['question_number'] + 1; //回答が送られるたびに問題数を増やす
  $correct_answer_number = $_POST['correct_answer_number']; //正解数
  
  //結果の判定
  if($question == $answer){
    $result = "正解！";
    $correct_answer_number = $_POST['correct_answer_number'] + 1;
  }else{
    $result = "不正解･･･";
  }

  //正解率
  $correct_answer_ratio = round($correct_answer_number / ($question_number -1) * 100, 1);

  //問題が25問に達したらランキングに登録する
  if($question_number == 25){
    header('Location: register.php?num='. $correct_answer_number);

  }
} 

  //最初の問題の処理
  if($_GET['page'] == 'start'){
    $question_number = 1; //問題数を1にする
    $correct_answer_number = 0; //正解数を0にする
  }


$answer = $quiz[$question_number - 1]['answer'][0]; //正解の問題を設定

shuffle($quiz[$question_number - 1]['answer']); //配列の中身をシャッフル
 
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ランキング形式クイズ</title>

</head>
<body>
<?php echo $result?>
<br><br>
第<?php echo $question_number ?>問目<br>
正解数：<?php echo $correct_answer_number ?> / <?php echo $question_number - 1 ?><br>
正答率：<?php echo $correct_answer_ratio ?>%<br>

<h2><?php echo $quiz[$question_number - 1]['question']; ?></h2>
<form method="POST" action="quiz.php">
   <?php foreach($quiz[$question_number - 1]['answer'] as $value){ ?>
   <input type="radio" name="question" value="<?php echo $value; ?>" /> <?php echo $value; ?><br>
   <?php } ?>
   <input type="hidden" name="answer" value="<?php echo $answer ?>">
   <input type="hidden" name="question_number" value="<?php echo $question_number ?>">
   <input type="hidden" name="correct_answer_number" value="<?php echo $correct_answer_number ?>">
   <input type="submit" value="回答する">
</form>
 
</body>
</html>

