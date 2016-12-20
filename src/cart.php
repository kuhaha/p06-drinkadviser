<?php
include('page_header.php'); 
include('func.inc.php');
require_once('db_inc.php'); 
$sql = "select * from tb_order where uid='{$uid}' and status=0";
$rs = mysql_query($sql, $conn);
if (!$rs) die('エラー: ' . mysql_error());
$row= mysql_fetch_array($rs);
$cart_id =  ($row) ? $row['oid'] : 0;

if(isset($_POST['dk_id'])){
  $dk_id = $_POST['dk_id'];
  $qty = $_POST['qty'];
  if ($cart_id == 0){
    $sql = "insert into tb_order(uid) values('{$uid}')";
    $rs = mysql_query($sql, $conn);
    $cart_id = mysql_insert_id();
  }
  if ($cart_id > 0){
    if (isset($_POST['oid'])){//再計算
      $oid =  $_POST['oid'];
      $sql = "delete from tb_order_detail where oid={$oid} and dk_id={$dk_id}";
      $rs = mysql_query($sql, $conn);
    }

    if ($qty > 0){
      $sql ='insert into tb_order_detail(oid,dk_id,qty) values';
      $sql .= "(" .$cart_id .",'". $dk_id . "',".$qty.")";
      $rs = mysql_query($sql, $conn);
      if (!$rs)  die('エラー: ' . mysql_error());
    }
  }
}
$sql = "select * from vw_chumon1 where oid={$cart_id} and status=0";

$rs = mysql_query($sql, $conn);
if (!$rs) die('エラー: ' . mysql_error());
$row= mysql_fetch_array($rs);

echo '<h3 class="text-success">現在のショッピングカートの内容</h3>';
echo '<table class="table table-hover">';
echo '<tr><th>番号</th><th>ドリンク名</th><th>数量</th><th>単価</th><th>金額</th></tr>';
$total = 0;
while ($row) {
  echo '<tr>';
  echo '<td>' . $row['dk_id'] .'</td>';
  echo '<td>' . $row['dk_name'] .'</td>';
  echo '<td>' . $row['qty'] .'</td>';
  echo '<td>' . $row['price'] .'円</td>';
  echo '<td>' . $row['money'] .'円</td>';
  echo '<td>' ;
  echo '<form class="form-inline" action="cart.php" method="post">';
  echo '<input type="hidden" name="dk_id" value="' .$row['dk_id']. '">';
  echo '<input type="hidden" name="oid" value="' .$row['oid']. '">';
  echo changeQty(0,5, $row['qty']);
  echo '<input class="btn btn-default" type="submit" value="再計算">';
  echo  '</form>';
  echo '</td>';
  $money = $row['price']*$row['qty'];
  $total += $money;
  echo '<td>' . $money .'円</td>';
  $row = mysql_fetch_array($rs) ;
  echo '</tr>';
}
echo '<table>';
echo '<h4>合計金額:'.$total.'円</h4>';
?>
<div class="pull-right">
<a class="btn btn-default" href="drink.php">注文を続ける</a> 
<a class="btn btn-success" href="order.php">レジへ進む</a>
</div>
<?php
function changeQty($from, $to, $sel){
  $options = '<select class="form-control" name="qty">';
  for ($i=$from; $i<=$to; $i++){
    if ($i==$sel){
      $options .= '<option value="'. $i .'" selected>' . $i ;
    }else{
      $options .= '<option value="'. $i .'">' . $i ;
    }
  }
  return $options . '</select>';
}
?>
