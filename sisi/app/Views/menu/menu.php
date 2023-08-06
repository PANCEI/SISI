<?= $this->extend('layout/layout'); ?>
<?= $this->section('content'); ?>

<div class="col-3-lg">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahmenu">
        Tambah Menu
    </button>
</div>
<div class="modal fade" id="tambahmenu" tabindex="-1" data-bs-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post" action="/menu/tambah">
                    <input type="hidden" name="menu_id" value="<?= kode() ?>">
                    <input type="hidden" name="createdby" value="<?= $user['USERNAME'] ?>">
                    <input type="hidden" name="updatedby" value="<?= $user['USERNAME'] ?>">
                    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                    <input type="hidden" name="deskripsi" value="Memasukan Data Menu Baru">
                    <input type="hidden" name="status" value="Berhasil">
                    <div class="col-md-12">
                        <label for="inputName5" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" id="inputName5" name="menu_name" required>
                    </div>
                    <div class="col-md-12">
                        <label for="menulink" class="form-label">Menu Link</label>
                        <input type="text" class="form-control" id="menulink" name="menulink" required>
                    </div>
                    <div class="col-md-12">
                        <label for="menuicon" class="form-label">Menu Icon</label>
                        <input type="text" class="form-control" id="menuicon" name="menuicon" required>
                    </div>

                    <div class="col-md-12">
                        <label for="menulevel" class="form-label">Menu Level</label>
                        <select id="menulevel" class="form-select" name="id_level">
                            <option selected>Choose...</option>
                            <?php
                            $level = MenuLevel();
                            foreach ($level as $l) :
                            ?>
                                <option value="<?= $l['ID_LEVEL'] ?>"><?= $l['LEVEL']; ?></option>
                            <?php endforeach; ?>
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
<div class="col-lg-12">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Menu Name</th>
                <th scope="col">Menu Link</th>
                <th scope="col">Menu Icon</th>
                <th scope="col">Level</th>
                <th scope="col">Delete Mark</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($menu as $m) : ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $m['MENU_NAME']; ?></td>
                    <td><?= $m['MENU_LINK']; ?></td>
                    <td><?= $m['MENU_ICON']; ?></td>
                    <td class="text-uppercase"><?= $m['LEVEL']; ?></td>
                    <td>
                        <div class="form-check">
                            <input class="form-check-input deletemark" <?= deletemark($m['DELETE_MARK'])  ?> type="checkbox" data-menuid="<?= $m['MENU_ID'] ?>" data-base="<?= base_url()  ?>" data-cek="<?= $m['DELETE_MARK'] ?>" data-idm="<?= $_GET['id'] ?>" data-createdby="<?= $user['USERNAME'] ?>">

                        </div>
                    </td>
                    <td>
                        <div class="col-3-lg">
                            <button type="button" class="badge bg-primary" data-bs-toggle="modal" data-bs-target="#<?= $m['MENU_ID'] ?>">
                                Edit
                            </button>
                        </div>
                        <div class="modal fade" id="<?= $m['MENU_ID'] ?>" tabindex="-1" data-bs-backdrop="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="row g-3" method="post" action="/menu/edit">
                                            <input type="hidden" name="id_menu" value="<?= $m['MENU_ID'] ?>">
                                            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                                            <input type="hidden" name="createdby" value="<?= $user['USERNAME'] ?>">
                                            <div class="col-md-12">
                                                <label for="inputName5" class="form-label">Menu Name</label>
                                                <input type="text" class="form-control" id="inputName5" name="menu_name" required value="<?= $m['MENU_NAME'] ?>">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="menulink" class="form-label">Menu Link</label>
                                                <input type="text" class="form-control" id="menulink" required value="<?= $m['MENU_LINK'] ?>" name="menu_link">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="menuicon" class="form-label">Menu Icon</label>
                                                <input type="text" class="form-control" id="menuicon" required value="<?= $m['MENU_ICON'] ?>" name="menuicon">
                                            </div>

                                            <div class="col-md-12">
                                                <label for="inputState" class="form-label">Menu Level</label>
                                                <select id="inputState" class="form-select" name="id_level">
                                                    <option selected value="<?= $m['ID_LEVEL'] ?>"><?= $m['LEVEL'] ?></option>
                                                    <?php
                                                    $level = MenuLevel();
                                                    foreach ($level as $l) :
                                                    ?>
                                                        <option value="<?= $l['ID_LEVEL'] ?>"><?= $l['LEVEL']; ?></option>
                                                    <?php endforeach; ?>
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
                    </td>
                </tr>
            <?php
                $i++;
            endforeach; ?>
        </tbody>
    </table>

</div>
<?= $this->endSection('content'); ?>
<?= $this->section('js'); ?>
<?= $this->endSection('js'); ?>