<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>
<!-- Disabled Backdrop Modal -->

<div class="col-lg-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#disablebackdrop">
        Tambah User
    </button>
</div>
<div class="modal fade" id="disablebackdrop" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post" action="/user/tambah">
                    <input type="hidden" name="user_id" value="<?= kodeUser() ?>">
                    <input type="hidden" name="createdby" value="<?= $user['USERNAME'] ?>">
                    <input type="hidden" name="updatedby" value="<?= $user['USERNAME'] ?>">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="deskripsi" value="Memasukan Data User Baru">
                    <input type="hidden" name="status" value="Berhasil">
                    <div class="col-md-12">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="col-md-12">
                        <label for="name_user" class="form-label">Name User</label>
                        <input type="text" class="form-control" id="name_user" name="menu_name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-md-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="col-md-12">
                        <label for="no_hp" class="form-label">No Hp</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="col-md-12">
                        <label for="wa" class="form-label">WA</label>
                        <input type="text" class="form-control" id="wa" name="wa" required>
                    </div>
                    <div class="col-md-12">
                        <label for="pin" class="form-label">Pin</label>
                        <input type="password" class="form-control" id="pin" name="pin" required>
                    </div>


                    <div class="col-md-12">
                        <label for="menulevel" class="form-label">Jenis User</label>
                        <select id="menulevel" class="form-select" name="jenis_user">
                            <option selected>Choose...</option>
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                        </select>
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
<!-- data table user -->
<div class="table-responsive mt-4">
    <table class="table table-hover table-bordered" id="data-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">No Hp</th>
                <th scope="col">Wa</th>
                <th scope="col">Jenis User</th>
                <th scope="col">Status User</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($all as $a) : ?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $a['USERNAME']; ?></td>
                    <td><?= $a['EMAIL']; ?></td>
                    <td><?= $a['NO_HP']; ?></td>
                    <td><?= $a['WA']; ?></td>
                    <?php if ($a['ID_JENIS_USER'] == '1') : ?>
                        <td>Admin</td>
                    <?php else : ?>
                        <td>Karywan</td>
                    <?php endif; ?>
                    <td><?= $a['STATUS_USER']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<!-- ahir data table user -->

<?= $this->endSection('content'); ?>
<?= $this->section('js'); ?>
<?= $this->endSection('js'); ?>