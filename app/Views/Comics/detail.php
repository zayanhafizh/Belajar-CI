<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="mt-2">Detail Komik</h2>
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                    <img src="/img/<?= $komik['sampul'];?>" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $komik['judul'];?></h5>
                        <p class="card-text"><b>Penulis : </b><?= $komik['penulis'];?></p>
                        <p class="card-text"><small class="text-body-secondary"><b>Penerbit : </b><?= $komik['penerbit'];?></small></p>
                    
                        <!-- url spooving -->
                        <form action="/comics/<?= $komik['id'];?>" method="post" class="d-inline">
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
                        </form>
                        <!-- url spooving -->
                        <a href="/comics/edit/<?= $komik['slug'];?>" class="btn btn-warning">Ubah</a>


                        <a href="/comics" class="mt-2">Kembali ke daftar komik</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>