<?= $this->session->Flashdata('pesan'); ?>

<div class="card">
    <div class="card-header">
        <a href="<?= base_url('guru/tambah') ?>" class=" btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Guru </a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Id</th>
                    <th>Nama</th>
                    <th>NBM</th>
                    <th>Mata Pelajaran</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                </tr>
            </thead>

            <?php $no = 1;
            foreach ($guru as $gr) : ?>
                <tbody>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $gr->id_guru ?></td>
                        <td><?= $gr->nm_guru ?></td>
                        <td><?= $gr->nbm_guru ?></td>
                        <td><?= $gr->mapel ?></td>
                        <td><?= $gr->tgl_lhr ?></td>
                        <td>
                            <button data-toggle="modal" data-target="#edit<?= $gr->id_guru ?>" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i></button>
                            <a href="<?= base_url('guru/delete/' . $gr->id_guru) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                            <i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>

<!-- Modal Edit -->

<?php foreach ($guru as $gr) { ?>
    <div class="modal fade" id="edit<?= $gr->id_guru ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Guru</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('guru/edit/' . $gr->id_guru) ?>" method="POST">
                        <div class="form-group">
                            <label>Id Guru</label>
                            <input type="text" name="id_guru" class="form-control" value="<?= $gr->id_guru ?>">
                            <?= form_error('id_guru', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Nama Guru</label>
                            <input type="text" name="nm_guru" class="form-control" value="<?= $gr->nm_guru ?>">
                            <?= form_error('nm_guru', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>NBM Guru</label>
                            <input type="text" name="nbm_guru" class="form-control" value="<?= $gr->nbm_guru ?>">
                            <?= form_error('nbm_guru', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Mata Pelajaran</label>
                            <input type="text" name="mapel" class="form-control" value="<?= $gr->mapel ?>">
                            <?= form_error('mapel', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Lahir</label>
                            <input type="text" name="tgl_lhr" class="form-control" value="<?= $gr->tgl_lhr ?>">
                            <?= form_error('tgl_lhr', '<div class="text-small text-danger">', '</div>'); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan </button>
                            <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php } ?>