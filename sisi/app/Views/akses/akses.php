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
            foreach ($all as $l) :
            ?>
                <tr>
                    <th scope="row"><?= $i; ?></th>
                    <td><?= $l['USERNAME']; ?></td>
                    <td>
                        <a href="/akses/add?id=<?= $l['ID_USER'] ?>&&idm=<?= $_GET['id'] ?>" class="badge bg-primary">Add</a>
                    </td>
                </tr>
            <?php
                $i++;
            endforeach;
            ?>
        </tbody>
    </table>
    <!-- End Table with hoverable rows -->

</div>
<?= $this->endSection('content'); ?>
<?= $this->section('js'); ?>
<?= $this->endSection('js'); ?>