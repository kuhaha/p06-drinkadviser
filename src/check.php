<?php
include_once('db_inc.php');
include_once('func.inc.php');

 $u = $_POST['uid'] ;
 $p = $_POST['pass'];
 $sql = "SELECT * FROM tb_user natural join tb_role WHERE uid= '{$u}'  AND upass='{$p}'";
 $err = 0;
 $rs = mysql_query($sql, $conn);
 if ($rs){
    $row= mysql_fetch_array($rs);//問合せ結果を1行受け取る
    if ($row){
      session_start();
      $_SESSION['uid']   = $row['uid'];
      $_SESSION['uname'] = $row['uname'];
      $_SESSION['urole'] = $row['urole'];
      $_SESSION['urname'] = $row['role_name'];
      header('Location:index.php');
   }else{
      $err = 2;
      $msg = 'ユーザイDかパスワードが間違いました！';
   }
}else{
   $err = 1;
   $msg = 'エラー：' + mysql_error();
}
if ($err > 0){
   include('page_header.php');
   err_msg($msg);
   include('page_footer.php');

}
?>