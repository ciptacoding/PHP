<?php
require 'functions.php';
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();

$mahasiswa = result("SELECT ma.*, ju.nama nama_jurusan 
                    FROM mahasiswa ma 
                    JOIN jurusan ju ON ma.id_jurusan = ju.id");
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
</head>

<body>
    <h3>ITB Stikom Bali</h3>
    <h1>Daftar Mahasiswa</h1>
    <table class="table table-bordered" border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Nim</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!$mahasiswa) : ?>
                <tr class="text-nowrap">
                    <td colspan="6" class="text-center text-danger">Data tidak ditemukan!</td>
                </tr>
            <?php endif ?>
            <?php $i = 1; ?>
            <?php foreach ($mahasiswa as $ma) : ?>
                <tr>
                    <th class="align-middle text-nowrap" scope="row"><?= $i++ ?></th>
                    <td class="align-middle text-nowrap"><?= $ma['nama'] ?></td>
                    <td class="align-middle text-nowrap"><?= $ma['nim'] ?></td>
                    <td class="align-middle text-nowrap"><?= $ma['nama_jurusan'] ?></td>
                    <td class="align-middle text-nowrap"><img src="<?= url_root() ?>/uploads/<?= $ma['foto'] ?>" alt="foto" width="25"></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();

$stylesheet = file_get_contents('assets/css/main.css');

$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);

$mpdf->Output('daftar-mahasiswa.pdf', 'I');
