<?php
require_once './coneksi.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["namaPemesan"];
    $ntlp = $_POST["noTelpon"];
    $durasi = $_POST["durasiPerjalanan"];
    $jumlah = $_POST["jumlahPeserta"];
    $harga_paket = $_POST["hargapaket"];
    $jumlah_tagihan = $_POST["jumlahtagihan"];
    $layanan = $_POST["layanan"];


    if ($nama == "" || $ntlp == "" || $durasi == "" || $jumlah == "" || $harga_paket == "" || $jumlah_tagihan == "") {
        header("Location:add_data.php?error=data tidak lengkap", true, 400);
    } else {
        $harga_paket = (int)substr($harga_paket, 3);
        $jumlah_tagihan = (int)substr($jumlah_tagihan, 3);
        $layanan = implode(",", $layanan);

        $resultid = Coneksi::insertData($nama, $ntlp, $durasi, $jumlah, $harga_paket, $jumlah_tagihan, $layanan);
        echo $resultid;
    }
}
