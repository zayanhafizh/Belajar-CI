<?= $this->extend('layout/template');?>

<?= $this->section('content');?>

<div class="container">
    <div class="row">
        <h1>Contact</h1>
        <div class="col">
            <?php foreach( $alamat as $a): ?>
                <ul>
                    <li><?= $a['jalan']; ?></li>
                    <li><?= $a['nomor']; ?></li>
                    <li><?= $a['kota']; ?></li>
                </ul>
            <?php endforeach ?>
        </div>
    </div>
</div>
<?= $this->endSection();?>