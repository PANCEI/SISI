<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="col-lg-7 mt-5">

    <!-- Table with hoverable rows -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($menu as $m) :
            ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $m['MENU_NAME']; ?></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input akses" <?= cekAKses(session('id_user'), $m['MENU_ID'])  ?> type="checkbox" data-menuid="<?= $m['MENU_ID'] ?>" data-base="<?= base_url()  ?>" data-cek="<?= $m['MENU_ID'] ?>" data-idm="<?= $_GET['id'] ?>" data-date="<?= date('d-m-Y') ?>" data-created="<?= $user["USERNAME"]  ?>" data-module="<?= $_GET['idm'] ?>">
                        </div>

                    </td>
                </tr>
            <?php
                $i++;
            endforeach;
            ?>
        </tbody>
    </table>

    <?= $this->endSection('content'); ?>
    <?= $this->section('js'); ?>
    <?= $this->endSection('js'); ?>