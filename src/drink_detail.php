<?php
include('page_header.php'); 
include('func.inc.php');
require_once('db_inc.php'); 
if (isset($_GET['id'])){ 
  $id = $_GET['id'];
}elseif (isset($_POST['id'])){
  $p = $_POST;
  $id = $_POST['id'];
  $set = "dk_name='" . $p['dk_name'] . "',ingredients='". $p['ingredients'] . 
     "',dk_detail='". $p['dk_detail'] . "',color='". $p['color'] .  "',taste='" . $p['taste'] . "'"; 
  $sql = "UPDATE tb_drink SET $set WHERE dk_id=$id";
  mysql_query($sql,$conn);
  if (mysql_affected_rows($conn)>0){
    header('Location:drink.php');
  }else{
    echo '<h3>失敗んして更新されませんでした。</h3>';
  }
}
$dk_name =  $dk_detail = $ingredients = '';
$color = $taste = $price = $alcohol='';
if (isset($id)){
  
  $sql = "SELECT * FROM tb_tags WHERE dk_id={$id}" ;
  $rs = mysql_query($sql, $conn);
  $tags =array();
  if ($rs) {
    $row = mysql_fetch_array($rs) ;
    while ($row) {
      $tags[$id] = isset($tags[$id]) ? $tags[$id] .'、' . $row['tag'] : $row['tag'];
      $row = mysql_fetch_array($rs) ;
    }
  }
  $sql = "SELECT * FROM tb_drink WHERE dk_id={$id}" ;
  $rs = mysql_query($sql, $conn);

  if ($rs) {
    echo '<table class="table table-striped table-hover">';
    $row = mysql_fetch_array($rs) ;
    $dk_name =  $row['dk_name'];
    $dk_detail = $row['dk_detail'];
    $alcohol =  $row['alcohol'];
    $ingredients = $row['ingredients'];
    $color = $row['color'];
    $taste = $row['taste'];
    $price = $row['price'];

    $fname = 'dk' .str_pad($id,5,'0',STR_PAD_LEFT) . '.jpg';
    $tag = isset($tags[$id]) ? $tags[$id] : '';
    $det = preg_replace('/#/','・',$row['dk_detail']);
    $ind = preg_replace('/#/','・',$row['ingredients']);

    echo '<tr><th rowspan=8>' .'<img src="../img/'.$fname .'" height="210px" width="300px">';
    if ($urole==1){
      echo '<div class="center-block text-center">';
      echo '<form class="form-inline" action="cart.php" method="post">';
      echo '<input type="hidden" name="dk_id" value="' .$id. '">';
      echo '<select class="form-control bg-primary" name="qty">';
      for ($i=1; $i<6; $i++)  echo '<option value="'. $i .'">' . $i ;
      echo '</select>';
      echo '<input class="btn btn-primary" type="submit" value="カートに入れる">';
      echo '</form>';
      echo '</div>';
    }
    echo '</th>';
    if ($urole<=1){
      echo '<th><h5 class="text-success">名称</h5>'. $dk_name. '</h5></th></tr>';
      echo '<tr><td><h5 class="text-success">特徴</h5>' . $det . '</td></tr>';
      echo '<tr><td><h5 class="text-primary">材料</h5>' . $ind . '</td></tr>';
      echo '<tr><td><h5 class="text-info">アルコール</h5>' . $alcohol . '%</td></tr>';
      echo '<tr><td><h5 class="text-danger">色</h5>' . $color . '</td></tr>';
      echo '<tr><td><h5 class="text-primary">味</h5>' . $taste . '</td></tr>';
      echo '<tr><td><h5 class="text-primary">価格</h5>' . $price . '円（税込）</td></tr>';
    }else{
      echo '<form action="drink_detail.php" method="post">';
      echo '<input type="hidden" name="id" value="' .$id . '">';
      echo '<td><h5 class="text-success">名称</h5>';
      echo '<input class="form-control" name="dk_name" type="text" value="' .$dk_name . '">';
      echo '</td></tr>';
      echo '<tr><td><h5 class="text-success">特徴</h5>';
      echo '<textarea class="form-control" name="dk_detail" cols=50>' .$dk_detail . '</textarea>';
      echo '</td></tr>';
      echo '<tr><td><h5 class="text-primary">材料</h5>';
      echo '<textarea class="form-control" name="ingredients" cols=50>' .$ingredients . '</textarea>';
      echo '</td></tr>';
      echo '<tr><td><h5 class="text-primary">アルコール</h5>';
      echo '<textarea class="form-control" name="ingredients" cols=50>' .$alcohol . '%</textarea>';
      echo '</td></tr>';
      echo '<tr><td><h5 class="text-danger">色</h5>';
      echo '<input class="form-control" name="color" type="text" value="' .$color . '">';
      echo '</td></tr>';
      echo '<tr><td><h5 class="text-primary">味</h5>';
      echo '<input class="form-control" name="taste" type="text" value="' .$taste . '">';
      echo '</td></tr>';
       echo '<tr><td><h5 class="text-primary">価格</h5>';
      echo '<input class="form-control" name="price" type="text" value="' .$price . '">';
      echo '</td></tr>';
      echo '<tr><td><input class="btn btn-block btn-primary" type="submit" value="保存">';
      echo '</td></tr>';
      echo '</form>';
    }
    echo '</table>';
    
  }
}
include('page_footer.php');  //画面出力終了
?>