<form action="<?= base_url('guru/tambah_aksi') ?>" method="POST">
    <div class="form-group">
        <label>Id Guru</label>
        <input type="text" name="id_guru" class="form-control">
        <?= form_error('id_guru', '<div class="text-small text-danger">' , '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Nama Guru</label>
        <input type="text" name="nm_guru" class="form-control">
        <?= form_error('nm_guru', '<div class="text-small text-danger">' , '</div>'); ?>
    </div>
    <div class="form-group">
        <label>NBM Guru</label>
        <input type="text" name="nbm_guru" class="form-control">
        <?= form_error('nbm_guru', '<div class="text-small text-danger">' , '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Mata Pelajaran</label>
        <input type="text" name="mapel" class="form-control">
        <?= form_error('mapel', '<div class="text-small text-danger">' , '</div>'); ?>
    </div>
    <div class="form-group">
        <label>Tanggal Lahir</label>
        <input type="text" name="tgl_lhr" class="form-control">
        <?= form_error('tgl_lhr', '<div class="text-small text-danger">' , '</div>'); ?>
    </div>

    <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Simpan </button>
    <button type="reset" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Reset </button>
</form>
