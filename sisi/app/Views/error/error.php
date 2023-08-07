<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="table-responsive">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">DATE</th>
                <th scope="col">MODUL</th>
                <th scope="col">Message</th>
                <th scope="col">Created By</th>
                <th scope="col"> PARAMETER</th>
                <th scope="col">DELETE MARK</th>

            </tr>
        </thead>
        <tbody>
            <?php $i = 1 ?>
            <?php foreach ($all as $a) : ?>
                <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $a['CREATE_DATE']; ?></td>
                    <td><?= $a['MODULES']; ?></td>
                    <td><?= $a['ERROR_MESSAGE']; ?></td>
                    <td><?= $a['UPDATE_BY']; ?></td>
                    <td><?= $a['PARAM']; ?></td>
                    <td>

                        <div class="form-check">
                            <input class="form-check-input  deletemarkactivity" <?= deletemark($a['DELETE_MARK'])  ?> type="checkbox" data-menuid="" data-base="" data-cek="" data-idm="<?= $_GET['id'] ?>" data-createdby="<?= $user['USERNAME'] ?>">

                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->endSection('content'); ?>
    <?= $this->section('js'); ?>
    <?= $this->endSection('js'); ?>