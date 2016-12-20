<?php
include('page_header.php'); 
include('func.inc.php');
require_once('db_inc.php'); 
echo '<h3 class="text-success">お勧めのドリンク</h3>';
$sql = "SELECT * FROM tb_tags" ;
$rs = mysql_query($sql, $conn);
$tags =array();
if ($urole==1){
  echo '<div class="pull-right"><a class="btn btn-default" href="cart.php">カートを見る</a></div>';
}

if ($rs) {
  $row = mysql_fetch_array($rs) ;
  while ($row) {
    $id = $row['dk_id'];
    $tags[$id] = isset($tags[$id]) ? $tags[$id] .'、' . $row['tag'] : $row['tag'];
    $row = mysql_fetch_array($rs) ;
  }
}
$sql = "SELECT * FROM tb_drink";
$rs = mysql_query($sql, $conn);
if ($rs) {
  echo '<table class="table table-striped table-hover">';
  echo '<tr><th>ドリンク名</th><th>色</th><th>味</th><th>特徴</th><th>原材料</th><th>タグ</th></tr>';
  $row = mysql_fetch_array($rs) ;
  while ($row) {
    $id = $row['dk_id'];
    $fname = 'dk' .str_pad($id,5,'0',STR_PAD_LEFT) . '.jpg';
    $tag = isset($tags[$id]) ? $tags[$id] : '';
    echo '<tr data-href="drink_detail.php?id='. $id . '">'; 
    echo '<th>' .'<img src="../img/'.$fname .'" height="100px" width="120px"><br>'. $row['dk_name']. '</th>';
    echo '<td>' . $row['color'] . '</td>';
    echo '<td>' . $row['taste'] . '</td>';
    $det = preg_replace('/#/','・',$row['dk_detail']);
    $ind = preg_replace('/#/','・',$row['ingredients']);
    echo '<td>' . $det . '</td>';
    echo '<td>' . $ind . '</td>';
    echo '<td>' . $tag . '</td>';
    echo '</tr>';

    $row = mysql_fetch_array($rs) ;

  }
  echo '</table>';
  if ($urole==1){
    echo '<div class="pull-right"><a class="btn btn-default" href="cart.php">カートを見る</a></div>';
  }

}
include('page_footer.php');  //画面出力終了
?>