<?php
$conf=array(
  'site_title' => 'Cafe & Bar Ayrevan',
  'site_name'  => '<span class="text-danger">Cafe</span> & <span class="text-success">Bar</span> <span class="text-primary">Ayrevan</span>',
);

$_guest_menu = array(
  '会員登録'=>'signup.php',
  'ログイン'=>'login.php',
);
$_user_menu = array(//共通メニュー
  'ログアウト'=>'logout.php',
);

$_pulldown_menu = array(
  0 => array(//ゲストメニュー
    'ドリンク紹介'=>'drink.php',
  ),
  1 => array(//会員メニュー
    'ドリンク紹介'=>'drink.php',
    '注文履歴' =>'order_hist.php',
  ),
  2 => array(//スタッフメニュー
    'ドリンク登録'=>'drink.php',
    '注文受付' =>'order_list.php',
    '顧客管理'=>'customer.php',
  ),
  3 => array(//店長メニュー
    'ドリンク登録'=>'drink.php',
    '注文受付' =>'order_list.php',
    '顧客管理'=>'customer.php',
  ),
);
