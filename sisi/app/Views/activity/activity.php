<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Deskripsi</th>
                <th scope="col">Menu</th>
                <th scope="col">Status</th>
                <th scope="col">Date</th>
                <th scope="col">Created By</th>
                <th scope="col">DELETE MARK</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($activity as $ac) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $ac['Diskripsi']; ?></td>
                    <td><?= $ac['MENU_NAME']; ?></td>
                    <td><?= $ac['STATUS']; ?></td>
                    <td><?= date('l, d F Y', strtotime($ac['CREATE_DATE'])) ?></td>
                    <td><?= $ac['CREATE_BY']; ?></td>
                    <td>

                        <div class="form-check">
                            <input class="form-check-input deletemarkactivity" <?= deletemark($ac['DELETE_MARK'])  ?> type="checkbox" data-menuid="<?= $ac['NO_ACTIVITY'] ?>" data-base="<?= base_url()  ?>" data-cek="<?= $ac['DELETE_MARK'] ?>" data-idm="<?= $_GET['id'] ?>" data-createdby="<?= $user['USERNAME'] ?>">

                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <?= $this->endSection('content'); ?>
    <?= $this->section('js'); ?>
    <?= $this->endSection('js'); ?>