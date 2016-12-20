<?php
include('page_header.php'); 
include('func.inc.php');
require_once('db_inc.php'); 
if (isset($_POST['confirm'])){
  $oid = $_POST['oid'];
  $sql = "update tb_order set status=1 where oid={$oid}";
  $rs = mysql_query($sql, $conn);
  if (!$rs) die('エラー: ' . mysql_error());
  echo '<h3 class="text-success">注文が確定しました</h3>';
}else{
  echo '<h3 class="text-success">注文内容確認</h3>';
  echo '<table class="table table-hover">';
  echo '<tr><th>番号</th><th>ドリンク名</th><th>数量</th><th>単価</th><th>金額</th></tr>';
  $total = 0;
  $sql = "select * from vw_chumon1 where uid='{$uid}' and status=0";
  $rs = mysql_query($sql, $conn);
  if (!$rs) die('エラー: ' . mysql_error());
  $row= mysql_fetch_array($rs);
  $oid = $row['oid'];
  while ($row) {
    echo '<tr>';
    echo '<td>' . $row['dk_id'] .'</td>';
    echo '<td>' . $row['dk_name'] .'</td>';
    echo '<td>' . $row['qty'] .'</td>';
    echo '<td>' . $row['price'] .'円</td>';
    echo '<td>' . $row['money'] .'円</td>';
    $total += $row['money'];
    $row = mysql_fetch_array($rs) ;
    echo '</tr>';
  }
  echo '<table>';
  echo '<h4>合計金額:'.$total.'円</h4>';
  echo '<form action="order.php" method="post">';
  echo '<input type="hidden" name="oid" value="' .$oid. '">';
  echo '<input type="hidden" name="confirm" value="yes">';
  echo '<br><input class="btn btn-default" type="submit" value="注文確定"></br>';
  echo '</form>';
  }
?>