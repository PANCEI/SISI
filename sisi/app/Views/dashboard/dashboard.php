<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="col-lg-12">

    <div class="card">
        <div class="card-body text-center">
            <h1 class="card-title ">SELAMAT DATANG</h1>
            <p class=" text-uppercase "><?= $user['USERNAME']; ?></p>
        </div>
    </div>

</div>


<?= $this->endSection('js'); ?>
<?= $this->section('js'); ?>
<?= $this->endSection('js'); ?>