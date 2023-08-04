<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<?php
$menu_user = menuUser();
foreach ($menu_user as $m) {
    $menu = Menu($m['MENU_ID']);
    var_dump($menu);
}
?>
<div class="col-lg-6">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Example Card</h5>
            <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
        </div>
    </div>

</div>

<div class="col-lg-6">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Example Card</h5>
            <p>This is an examle page with no contrnt. You can use it as a starter for your custom pages.</p>
        </div>
    </div>

</div>
<?= $this->endSection('js'); ?>
<?= $this->section('js'); ?>
<?= $this->endSection('js'); ?>