<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<div class="col-3-lg">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
        Tambah Level
    </button>
</div>
<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Level</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post" action="/level/tambah">
                    <input type="hidden" name="createdby" value="<?= $user['USERNAME'] ?>">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="deskripsi" value="Memasukan Data Level Baru">
                    <input type="hidden" name="status" value="Berhasil">
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">3 Letter Code Name</label>
                        <input type="text" class="form-control" id="inputName5" name="id_level" required>
                    </div>
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Menu Level</label>
                        <input type="text" class="form-control" id="inputName5" name="level" required>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form><!-- End Multi Columns Form -->
        </div>
    </div>
</div><!-- End Disabled Backdrop Modal-->
<!-- table level -->
<div class="col-lg-4 mt-5">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">ID LEVEL</th>
                <th scope="col">LEVEL</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($level as $l) :
            ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $l['ID_LEVEL']; ?></td>
                    <td><?= $l['LEVEL']; ?></td>

                </tr>
            <?php
                $i++;
            endforeach;
            ?>
        </tbody>
    </table>
</div>
<!-- end table level -->
<?= $this->endSection('content'); ?>
<?= $this->section('js'); ?>
<?= $this->endSection('js'); ?>