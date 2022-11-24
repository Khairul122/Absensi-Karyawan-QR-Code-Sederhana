<?php
include "vendor/autoload.php";
$mpdf = new \Mpdf\Mpdf();
?>

<h3 style="text-align: center; text-transform: uppercase;">Data Absensi Karyawan Honorer</h3>
<h3 style="text-align: center;">DINAS PERTANIAN DAN PANGAN KABUPATEN ACEH UTARA</h3>
<hr>
<table width="100%" border="1">
    <tr>
        <th>id</th>
        <th>Nama</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Kehadiran</th>
        <th>Status</th>

    </tr>

    <?php
    $conn = mysqli_connect("localhost", "root", "", "demoabsen");
    $data = mysqli_query($conn, "SELECT * FROM presensi,karyawan,kehadiran,stts");
    while ($dt = mysqli_fetch_array($data)) {
    ?>

        <tr>
            <td><?= $dt['id_karyawan'] ?></dt>
            <td><?= $dt['nama_karyawan'] ?></dt>
            <td><?= $dt['tgl'] ?></dt>
            <td><?= $dt['jam_msk'] ?></dt>
            <td><?= $dt['jam_klr'] ?></dt>
            <td><?= $dt['nama_khd'] ?></dt>
            <td><?= $dt['nama_status'] ?></dt>
        </tr>
    <?php
    }
    ?>


</table>
</hr>

<?php
$html = ob_get_contents();
$mpdf->WriteHTML(utf8_decode($html));
$mpdf->Output("Data Laporan.pdf", "I");
exit;
?>