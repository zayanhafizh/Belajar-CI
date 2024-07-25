<?= $this->extend('layout/template');?>
<?= $this->section('content');?>

<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Tambah Data Komik</h2>
            <form action="<?= base_url('comics/save') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="judul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= !is_null($validation) && $validation->hasError('judul') ? 'is-invalid': '';?>" 
                        id="judul" name="judul" value="<?= old('judul') ? old('judul') : "";?>">
                        <?php if(!is_null($validation) && $validation->hasError('judul')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('judul');?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penulis" class="col-sm-2 col-form-label">Penulis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= !is_null($validation) && $validation->hasError('penulis') ? 'is-invalid': '';?>" value="<?= old('penulis') ? old('penulis') : "";?>"
                         id="penulis" name="penulis">
                         <?php if(!is_null($validation) && $validation->hasError('penulis')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penulis');?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="penerbit" class="col-sm-2 col-form-label">Penerbit</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= !is_null($validation) && $validation->hasError('penerbit') ? 'is-invalid': '';?>" value="<?= old('penerbit') ? old('penerbit') : "";?>"
                         id="penerbit" name="penerbit">
                         <?php if(!is_null($validation) && $validation->hasError('penerbit')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('penerbit');?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-3">
                            <input type="file" class="form-control <?= !is_null($validation) && $validation->hasError('sampul') ? 'is-invalid': '';?>" 
                             id="sampul" name="sampul">
                            <label class="input-group-text" for="sampul">Pilih gambar...</label>
                            <?php if(!is_null($validation) && $validation->hasError('sampul')) : ?>
                            <div class="invalid-feedback">
                                <?= $validation->getError('sampul');?>
                            </div>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection();?>
