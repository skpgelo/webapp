<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<style>
body
    {
    font-family: DejaVu Sans; font-size:10px;
    } 
    table{width:100%; border-collapse:collapse;
    } 
    th,td{border:1px solid #000; padding:4px;
    }
</style>
</head>
<body>
    <h3>Laporan Data Utama</h3>
    <p>
        Filter: 
        Kecamatan: <?= esc($filter['kecamatan'] ?: 'Semua') ?> | 
        Kategori: <?= esc($filter['kategori'] ?: 'Semua') ?> |
        Tanggal: <?= esc($filter['tgl_awal'] ?: '...') ?> s/d <?= esc($filter['tgl_akhir'] ?: '...') ?>
        | Cetak: <?= date('d-m-Y H:i') ?>
    </p>
    <table>
        <thead><tr>
            <th>No</th><th>Nama / NIP</th><th>Jabatan</th><th>Kategori</th><th>Alamat</th><th>Tgl Upload</th>
        </tr></thead>
        <tbody>
        <?php foreach($data as $i=>$d): ?>
        <tr>
            <td><?= $i+1 ?></td>
            <td><?= esc($d->nama) ?><br><small><?= esc($d->nip) ?></small></td>
            <td><?= esc($d->jabatan) ?></td>
            <td><?= esc($d->kategori) ?></td>
            <td><?= esc($d->alamat) ?>, <?= esc($d->desa) ?></td>
            <td><?= date('d-m-Y H:i', strtotime($d->created_at)) ?></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>