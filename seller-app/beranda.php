<?php
session_start();
include('../config/db.php');

if (isset($_SESSION['username_login'])) {
    $username_login = $_SESSION['username_login'];
}

?>
<div class="user-profile mb-20">
    <div class="user-profile__thumb"><img src="<?= $base_url; ?>ladun/assets/images/photos/image-18.jpg" alt="" title="" /></div>
    <div class="user-profile__name">-<br />(<?= $username_login; ?>)</div>
    <div class="buttons buttons--centered mb-20">
        <a href="javascript:void(0)" class="button button--main">Edit Profil</a>
    </div>
    <div class="buttons buttons--centered">
        <div class="info-box"><span>Total Produk</span> 12</div>
        <div class="info-box"><span>Total Produk dilihat</span> 9k</div>
        <div class="info-box"><span>Total Produk disukai</span> 9k</div>
    </div>
</div>