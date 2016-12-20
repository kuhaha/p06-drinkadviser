<?php
session_start();
if(isset($_SESSION['urole']) ){
	$uid = $_SESSION['uid'];

	if( $_SESSION['urole']!=1){
		include('page_header.php');  //画面出力開始
		echo "この機能を利用する権限がありません";
		include('page_footer.php');
		exit;
	}
}
$sid = substr($uid, 1, 7);
$sid = strtoupper($sid);
$careertype = $_POST['careertype'] ;
$detail = $_POST['detail'];
/*
 echo $careertype . '<br>';
 echo $detail . '<br>';
*/
 $sql = "INSERT INTO tb_wish(sid, careertype, detail) VALUES";
 $sql .= "('{$sid}',{$careertype},'{$detail}')";
 include_once('db_inc.php'); //データベース接続のプログラムを読み込む
 $rs = mysql_query($sql, $conn);//SQL文をサーバーに送信し実行
 if (!$rs) {
   die('エラー: ' . mysql_error());
 }


   $url = 'index.php';           //転送先のURL(TOPページ)
   header('Location:' . $url);   // 画面転送


?>