<?php
header('Content-Type: text/html; charset=UTF-8');
$dsn = 'mysql:dbname=tt_570_99sv_coco_com;host=localhost';
$user='tt-570.99sv-coco';
$password = 'z8QeP7R2';
$pdo = new PDO($dsn,$user,$password,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
?>





<?php
//フォームの情報を変数に格納
$name = $_POST['name'];
$comment = $_POST['comment'];
$number = $_POST['number'];
$edit = $_POST['edit'];
$edit_num = $_POST['edit_num'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
?>




<?php

 //mission3-7編集表示
 if(!empty($edit)){
  $sql    = 'SELECT * FROM tbtest3';
  $results = $pdo ->query($sql);
  $data    = $results->fetchAll();
  foreach($data as $row){
     if($row['id']==$edit){
      if($row['password'] == $password2){
      $edit2[0] =$row['id']; 
      $edit2[1] =$row['name'] ;
      $edit2[2] =$row['comment'] ;
      }
      else{
        $error = "パスワードが違います！";
      }
    }
   }
  }
 //mission3-7編集表示


?>






<head><?php echo $error; ?></head

>
<?php//フォーム作成
 ?>
<form  method ="post">
名前：<input type = "text" name = 'name' value = "<?php echo $edit2[1];?>" size = "20"><br>
コメント：<input type = "text" name = 'comment' value = "<?php echo $edit2[2];?>" size = "20">
<input type = "text" name = "password" placeholder = "パスワード">
<input type = "submit"value = "送信" ><br>
<input type ="text" name = 'edit_num' style ="visibility:hidden" value= "<?php echo $edit2[0];?>"><br>
削除番号:<input type = "text" name = 'number'>
<input type = "text" name = "password1" placeholder = "パスワード">
<input type = "submit" value="送信"><br>
編集対象番号:<input type="text" name="edit">
<input  type = "text" name = "password2" placeholder = "パスワード">
<input type="submit" value="編集"><br>
<br>







<?php
 //mission3-8
 if (!empty($number)){
  $sql = 'SELECT * FROM tbtest3';
  $results = $pdo ->query($sql);
  $data=$results->fetchAll();
  foreach($data as $row){
    if($row['id']==$number){
      if($row['password'] == $password1){
        $sql  =  "delete  from  tbtest3  where  id=$number";    
        $result  =  $pdo->query($sql);
      }
      else{
        $error = "パスワードが違います！";
      }
    }  
  }
 }
 
?>





<?php
 if (!empty($name) and !empty($comment) and !empty($password) and empty($edit)){
 $sql = $pdo ->prepare("INSERT INTO tbtest3(name,comment,password)VALUES(:name,:comment,:password)");
 $sql -> bindParam(':name',$name,PDO::PARAM_STR);
 $sql -> bindParam(':comment',$comment,PDO::PARAM_STR);
 $sql -> bindParam(':password',$password,PDO::PARAM_STR);
 $sql  ->  execute();
}

?>
<?php

 //mission3-7編集2
 if (!empty($edit_num)){
  $id = $edit_num ;
  $nm =  $_POST["name"] ;
  $kome  =  $_POST["comment"] ;  
  $pass  =  $_POST["password"] ;
  $sql  =  "update  tbtest3  set  name='$nm'  ,  comment='$kome' , password='$pass' where  id  =  $id";
  $result  =  $pdo->query($sql);
 }
 //mission3-7編集2


?>
<?php
$sql = 'SELECT * FROM tbtest3';
$results = $pdo ->query($sql);
foreach($results as $row){
 echo $row['id'].',';
 echo $row['name'].',';
 echo $row['comment'].',';
 echo $row['date'].'<br>';
}
?>
