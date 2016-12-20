<?php
include('page_header.php'); 
include('func.inc.php');
require_once('db_inc.php'); 

echo '<h3 class="text-success">注文受付</h3>';
echo '<table class="table table-hover">';
echo '<tr class="bg-primary"><th>日時</th><th>座席</th><th>ドリンク名</th><th>数量</th><th>単価</th><th>金額</th><th>操作</th></tr>';
$total = 0;
$sql = "select * from vw_chumon where status>0 order by od_date desc";
$rs = mysql_query($sql, $conn);
if (!$rs) die('エラー: ' . mysql_error());
$row= mysql_fetch_array($rs);
$oid = $row['oid'];
$class= array('danger','default');
while ($row) {
  echo '<tr>';
  echo '<td>' . $row['od_date'] .'</td>';
  echo '<td>' . $row['od_address'] .'</td>';
  echo '<td>' . $row['dk_name'] .'</td>';
  echo '<td>' . $row['qty'] .'</td>';
  echo '<td>' . $row['price'] .'円</td>';
  echo '<td>' . $row['money'] .'円</td>';
  $i= rand(0,1);
  echo '<td><a href="#" class="btn btn-'.$class[$i].'">OK</a></td>';

  $total += $row['money'];
  $row = mysql_fetch_array($rs) ;
  echo '</tr>';
}
echo '<table>';
echo '<h4>合計金額:'.$total.'円</h4>';
  
?>